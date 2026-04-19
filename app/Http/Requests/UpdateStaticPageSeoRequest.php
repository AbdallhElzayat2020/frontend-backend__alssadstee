<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\WebsiteSeoRequestFields;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStaticPageSeoRequest extends FormRequest
{
    use WebsiteSeoRequestFields;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Remove slug validation since they're now fixed
        return $this->seoFieldRules();
    }

    protected function prepareForValidation(): void
    {
        $this->normalizeWebsiteSeoFields();
    }
}
