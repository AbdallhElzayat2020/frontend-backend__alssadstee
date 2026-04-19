<?php

namespace App\View\Composers;

use App\Models\Product;
use App\Models\StaticPageSeo;
use Illuminate\View\View;

class WebsiteSeoComposer
{
    private const ROUTE_STATIC_PAGE_MAP = [
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

    public function compose(View $view): void
    {
        $locale = app()->getLocale();
        $routeName = request()->route()?->getName();

        $seo = [
            'title' => null,
            'description' => null,
            'keywords' => null,
            'canonical' => null,
            'schema_json_ld' => null,
        ];

        if ($routeName === 'products.show') {
            $product = $view->getData()['product'] ?? null;
            if ($product instanceof Product) {
                $seo = $this->fromSeoColumns($product, $locale);
            }
        } elseif ($routeName && isset(self::ROUTE_STATIC_PAGE_MAP[$routeName])) {
            $pageKey = self::ROUTE_STATIC_PAGE_MAP[$routeName];
            $row = StaticPageSeo::query()->where('page_key', $pageKey)->first();
            if ($row) {
                $seo = $this->fromSeoColumns($row, $locale);
            }
        }

        if (empty($seo['canonical'])) {
            $seo['canonical'] = url()->current();
        }

        $view->with('seoMeta', $seo);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    private function fromSeoColumns($model, string $locale): array
    {
        $title = $this->pickLocalized($model->meta_title_ar ?? null, $model->meta_title_en ?? null, $locale);
        $description = $this->pickLocalized($model->meta_description_ar ?? null, $model->meta_description_en ?? null, $locale);
        $keywords = $this->pickLocalized($model->meta_keywords_ar ?? null, $model->meta_keywords_en ?? null, $locale);
        $canonical = $this->pickLocalized($model->canonical_url_ar ?? null, $model->canonical_url_en ?? null, $locale);
        $schema = $this->pickLocalized($model->schema_markup_ar ?? null, $model->schema_markup_en ?? null, $locale);

        return [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
            'canonical' => $canonical,
            'schema_json_ld' => $schema,
        ];
    }

    private function pickLocalized(?string $ar, ?string $en, string $locale): ?string
    {
        $ar = $ar !== null ? trim($ar) : '';
        $en = $en !== null ? trim($en) : '';

        if ($locale === 'ar') {
            if ($ar !== '') {
                return $ar;
            }
            return $en !== '' ? $en : null;
        }

        if ($en !== '') {
            return $en;
        }
        return $ar !== '' ? $ar : null;
    }
}
