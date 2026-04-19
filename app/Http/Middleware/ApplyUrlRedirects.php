<?php

namespace App\Http\Middleware;

use App\Models\UrlRedirect;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class ApplyUrlRedirects
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! in_array($request->method(), ['GET', 'HEAD'], true)) {
            return $next($request);
        }

        $pathInfo = $request->getPathInfo();
        
        // Skip admin, health check, and static assets
        foreach (['/admin', '/up', '/storage'] as $prefix) {
            if (str_starts_with($pathInfo, $prefix)) {
                return $next($request);
            }
        }

        // Normalize and look for redirect
        $requestPath = UrlRedirect::normalizePath($pathInfo);
        $row = $this->findActiveRedirect($requestPath);
        
        if (! $row) {
            return $next($request);
        }

        $target = $this->resolveTargetUrl(trim($row->target_url));
        if ($this->wouldLoop($requestPath, $target)) {
            return $next($request);
        }

        $code = $row->redirect_type === UrlRedirect::TYPE_302 ? 302 : 301;

        // Update hit counter
        DB::table('url_redirects')->where('id', $row->id)->update([
            'hits_count' => DB::raw('hits_count + 1'),
            'last_hit_at' => now(),
        ]);

        return $this->redirectResponse($request, $target, $code);
    }

    private function redirectResponse(Request $request, string $target, int $code): Response
    {
        $target = trim($target);
        if (preg_match('#^https?://#i', $target)) {
            if ($this->isSameApplicationOrigin($request, $target)) {
                $path = parse_url($target, PHP_URL_PATH) ?: '/';
                $query = parse_url($target, PHP_URL_QUERY);
                $destination = $path.($query !== null && $query !== '' ? '?'.$query : '');

                return redirect()->to($destination, $code);
            }

            return redirect()->away($target, $code);
        }

        return redirect()->to($target, $code);
    }

    /**
     * Same host + scheme + port as this request (avoids broken responses from away() on some local servers).
     */
    private function isSameApplicationOrigin(Request $request, string $absoluteUrl): bool
    {
        $parts = parse_url($absoluteUrl);
        if ($parts === false || empty($parts['host'])) {
            return false;
        }

        $scheme = strtolower((string) ($parts['scheme'] ?? 'http'));
        $host = strtolower((string) $parts['host']);
        $port = $parts['port'] ?? null;

        $reqScheme = strtolower($request->getScheme());
        $reqHost = strtolower($request->getHost());
        $reqPort = (int) $request->getPort();

        $urlPort = $port !== null ? (int) $port : ($scheme === 'https' ? 443 : 80);

        return $scheme === $reqScheme && $host === $reqHost && $urlPort === $reqPort;
    }

    private function findActiveRedirect(string $requestPath): ?UrlRedirect
    {
        $map = Cache::rememberForever(UrlRedirect::CACHE_KEY, function () {
            return UrlRedirect::query()
                ->where('status', UrlRedirect::STATUS_ACTIVE)
                ->get()
                ->keyBy('source_path');
        });

        /** @var \Illuminate\Support\Collection<string, UrlRedirect> $map */
        if ($map->has($requestPath)) {
            return $map->get($requestPath);
        }

        $withoutLocale = $this->pathWithoutLeadingLocale($requestPath);
        if ($withoutLocale !== null && $map->has($withoutLocale)) {
            return $map->get($withoutLocale);
        }

        return null;
    }

    private function pathWithoutLeadingLocale(string $path): ?string
    {
        $path = trim($path, '/');
        if ($path === '') {
            return null;
        }
        $segments = explode('/', $path);
        $locales = array_keys(LaravelLocalization::getSupportedLocales());
        if (! in_array($segments[0], $locales, true)) {
            return null;
        }
        $rest = array_slice($segments, 1);
        if ($rest === []) {
            return '/';
        }

        return UrlRedirect::normalizePath('/' . implode('/', $rest));
    }

    private function resolveTargetUrl(string $target): string
    {
        if ($target === '') {
            return '/';
        }
        if (preg_match('#^https?://#i', $target)) {
            return $target;
        }

        $path = UrlRedirect::normalizePath($target);

        return LaravelLocalization::localizeUrl($path);
    }

    private function wouldLoop(string $requestPath, string $target): bool
    {
        if (preg_match('#^https?://#i', $target)) {
            $path = parse_url($target, PHP_URL_PATH) ?: '/';
        } else {
            $path = parse_url($target, PHP_URL_PATH) ?? $target;
        }

        return UrlRedirect::normalizePath((string) $path) === $requestPath;
    }
}
