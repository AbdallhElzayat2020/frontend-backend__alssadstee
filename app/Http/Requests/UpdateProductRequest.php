<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\WebsiteSeoRequestFields;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    use WebsiteSeoRequestFields;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return array_merge([
            'name.en' => ['required', 'string', 'max:255'],
            'name.ar' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'slug')->ignore($this->route('product')),
            ],
            'description.en' => ['nullable', 'string'],
            'description.ar' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ], $this->seoFieldRules());
    }

    protected function prepareForValidation(): void
    {
        $this->normalizeWebsiteSeoFields();
        if ($this->has('slug')) {
            $s = trim((string) $this->input('slug'));
            $this->merge(['slug' => $s === '' ? null : Str::slug($s)]);
        }
    }
}
