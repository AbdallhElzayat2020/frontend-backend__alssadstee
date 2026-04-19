<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateBlogCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('blogCategory')?->id;
        return [
            'name.en'  => ['required', 'string', 'max:255'],
            'name.ar'  => ['required', 'string', 'max:255'],
            'slug'     => ['nullable', 'string', 'max:255', Rule::unique('blog_categories', 'slug')->ignore($id)],
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
