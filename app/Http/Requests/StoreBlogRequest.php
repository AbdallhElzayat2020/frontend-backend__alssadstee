<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\WebsiteSeoRequestFields;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreBlogRequest extends FormRequest
{
    use WebsiteSeoRequestFields;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge([
            'blog_category_id'       => ['nullable', 'integer', 'exists:blog_categories,id'],
            'title.en'               => ['required', 'string', 'max:255'],
            'title.ar'               => ['required', 'string', 'max:255'],
            'short_title.en'         => ['required', 'string', 'max:255'],
            'short_title.ar'         => ['required', 'string', 'max:255'],
            'short_description.en'   => ['nullable', 'string'],
            'short_description.ar'   => ['nullable', 'string'],
            'description.en'         => ['nullable', 'string'],
            'description.ar'         => ['nullable', 'string'],
            'slug'                   => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'status'                 => ['nullable', 'in:active,inactive'],
            'image'                  => ['nullable', 'image', 'max:5120'],
        ], $this->seoFieldRules());
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('slug')) {
            $this->merge(['slug' => Str::slug($this->input('slug'))]);
        } else {
            $this->merge(['slug' => null]);
        }

        $this->normalizeWebsiteSeoFields();
    }
}
