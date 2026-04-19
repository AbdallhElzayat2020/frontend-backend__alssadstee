<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\WebsiteSeoRequestFields;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFaqRequest extends FormRequest
{
    use WebsiteSeoRequestFields;

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge([
            'question' => ['required', 'array'],
            'question.en' => ['required', 'string', 'max:255'],
            'question.ar' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'array'],
            'answer.en' => ['required', 'string'],
            'answer.ar' => ['required', 'string'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ], $this->seoFieldRules());
    }

    protected function prepareForValidation(): void
    {
        $this->normalizeWebsiteSeoFields();
    }
}
