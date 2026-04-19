<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'image',
        'image_name',
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
}
