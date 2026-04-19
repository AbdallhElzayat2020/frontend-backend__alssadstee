<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreBlogCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name.en'  => ['required', 'string', 'max:255'],
            'name.ar'  => ['required', 'string', 'max:255'],
            'slug'     => ['nullable', 'string', 'max:255', 'unique:blog_categories,slug'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('slug')) {
            $this->merge(['slug' => Str::slug($this->input('slug'))]);
        } else {
            $this->merge(['slug' => null]);
        }

        $this->merge(['is_active' => $this->boolean('is_active')]);
    }
}
