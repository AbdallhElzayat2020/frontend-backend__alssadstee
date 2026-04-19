<?php

namespace App\Http\Requests\Concerns;

trait WebsiteSeoRequestFields
{
    protected function seoFieldRules(): array
    {
        return [
            'meta_title_ar' => ['nullable', 'string', 'max:255'],
            'meta_title_en' => ['nullable', 'string', 'max:255'],
            'meta_description_ar' => ['nullable', 'string', 'max:65535'],
            'meta_description_en' => ['nullable', 'string', 'max:65535'],
            'meta_keywords_ar' => ['nullable', 'string', 'max:1024'],
            'meta_keywords_en' => ['nullable', 'string', 'max:1024'],
            'canonical_url_ar' => ['nullable', 'string', 'max:2048'],
            'canonical_url_en' => ['nullable', 'string', 'max:2048'],
            'schema_markup_ar' => ['nullable', 'string', 'json'],
            'schema_markup_en' => ['nullable', 'string', 'json'],
        ];
    }

    protected function normalizeWebsiteSeoFields(): void
    {
        $fields = [
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
        $merge = [];
        foreach ($fields as $field) {
            if ($this->input($field) === '') {
                $merge[$field] = null;
            }
        }
        if ($merge !== []) {
            $this->merge($merge);
        }
    }
}
