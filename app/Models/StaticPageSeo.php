<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPageSeo extends Model
{
    protected $fillable = [
        'page_key',
        'meta_title_ar',
        'meta_title_en',
        'meta_description_ar',
        'meta_description_en',
        'meta_keywords_ar',
        'meta_keywords_en',
        'canonical_url_ar',
        'canonical_url_en',
        'schema_markup_ar',
        'schema_markup_en',
    ];

    public function getRouteKeyName(): string
    {
        return 'page_key';
    }
}
