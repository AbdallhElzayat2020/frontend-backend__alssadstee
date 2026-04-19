<?php

namespace App\Helpers;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class StaticPageHelper
{
    private const PAGE_KEY_TO_ROUTE = [
        'home' => 'home',
        'about' => 'about',
        'contact-us' => 'contact-us',
        'facilities' => 'facilities',
        'faqs' => 'faqs',
        'integrated-system' => 'integrated-system',
        'jobs' => 'jobs',
        'media' => 'media',
        'products' => 'products',
        'quality' => 'quality',
        'quote' => 'quote',
    ];

    public static function url(string $pageKey, ?string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();

        if ($pageKey === 'home') {
            return LaravelLocalization::getLocalizedURL($locale, route('home', [], false));
        }

        $routeName = self::PAGE_KEY_TO_ROUTE[$pageKey] ?? null;
        if ($routeName === null) {
            return LaravelLocalization::getLocalizedURL($locale, '/');
        }

        return LaravelLocalization::getLocalizedURL($locale, route($routeName, [], false));
    }

    public static function getAllUrls(): array
    {
        $urls = [];
        foreach (array_keys(self::PAGE_KEY_TO_ROUTE) as $pageKey) {
            foreach (['en', 'ar'] as $locale) {
                $urls[] = [
                    'loc' => self::url($pageKey, $locale),
                    'locale' => $locale,
                    'page_key' => $pageKey,
                ];
            }
        }

        return $urls;
    }
}
