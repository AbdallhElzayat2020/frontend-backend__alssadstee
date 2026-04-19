<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UrlRedirect extends Model
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public const TYPE_301 = '301';

    public const TYPE_302 = '302';

    public const CACHE_KEY = 'url_redirects.active.v1';

    protected $fillable = [
        'source_path',
        'target_url',
        'redirect_type',
        'status',
        'description',
        'hits_count',
        'last_hit_at',
    ];

    protected function casts(): array
    {
        return [
            'last_hit_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        $clear = fn () => Cache::forget(self::CACHE_KEY);
        static::saved($clear);
        static::deleted($clear);
    }

    public static function statuses(): array
    {
        return [self::STATUS_ACTIVE, self::STATUS_INACTIVE];
    }

    public static function redirectTypes(): array
    {
        return [self::TYPE_301, self::TYPE_302];
    }

    /**
     * Normalize path: leading slash, no trailing slash except root.
     */
    public static function normalizePath(string $path): string
    {
        $path = trim(str_replace('\\', '/', $path));
        if ($path === '') {
            return '/';
        }
        if (! str_starts_with($path, '/')) {
            $path = '/' . $path;
        }
        $path = preg_replace('#/+#', '/', $path) ?? $path;
        $path = rtrim($path, '/');

        return $path === '' ? '/' : $path;
    }

    /**
     * Remove leading locale segment (ar/en/…) so rules use one "base" path for all languages.
     */
    public static function stripLocalePrefixFromPath(string $path): string
    {
        $path = self::normalizePath($path);
        if ($path === '/') {
            return '/';
        }
        $segments = explode('/', trim($path, '/'));
        if ($segments === [] || $segments === ['']) {
            return '/';
        }
        $locales = array_keys(LaravelLocalization::getSupportedLocales());
        if (! in_array($segments[0], $locales, true)) {
            return $path;
        }
        $rest = array_slice($segments, 1);
        if ($rest === []) {
            return '/';
        }

        return self::normalizePath('/'.implode('/', $rest));
    }

    /**
     * Build stored source_path from user "old URL" (path or full URL).
     */
    public static function normalizeSourceFromUserInput(string $input): string
    {
        $input = trim($input);
        if ($input === '') {
            return '/';
        }
        if (preg_match('#^https?://#i', $input)) {
            $path = parse_url($input, PHP_URL_PATH);
            $path = is_string($path) ? $path : '/';
        } else {
            $path = $input;
        }

        return self::stripLocalePrefixFromPath(self::normalizePath($path));
    }

    /**
     * Store target: relative paths as locale-less base path; full http(s) URLs kept as entered.
     */
    public static function normalizeTargetForStorage(string $target): string
    {
        $target = trim($target);
        if ($target === '') {
            return '/';
        }
        if (preg_match('#^https?://#i', $target)) {
            return $target;
        }

        return self::stripLocalePrefixFromPath(self::normalizePath($target));
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}
