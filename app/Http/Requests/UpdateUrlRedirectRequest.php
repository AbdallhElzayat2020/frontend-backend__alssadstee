<?php

namespace App\Http\Requests;

use App\Http\Requests\Concerns\ValidatesProductRedirectTarget;
use App\Models\UrlRedirect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUrlRedirectRequest extends FormRequest
{
    use ValidatesProductRedirectTarget;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'old_url' => ['required', 'string', 'max:2048', $this->maxSourcePathLengthRule(), $this->uniqueSourceRule()],
            'new_url' => ['required', 'string', 'max:2048', $this->productRedirectTargetExistsRule()],
            'redirect_type' => ['required', Rule::in(UrlRedirect::redirectTypes())],
            'status' => ['required', Rule::in(UrlRedirect::statuses())],
            'description' => ['nullable', 'string', 'max:65535'],
        ];
    }

    private function uniqueSourceRule(): \Closure
    {
        return function (string $attribute, mixed $value, \Closure $fail): void {
            $normalized = UrlRedirect::normalizeSourceFromUserInput((string) $value);
            $id = $this->route('url_redirect')?->id;
            $q = UrlRedirect::query()->where('source_path', $normalized);
            if ($id) {
                $q->where('id', '!=', $id);
            }
            if ($q->exists()) {
                $fail('This path already has a redirect.');
            }
        };
    }

    private function maxSourcePathLengthRule(): \Closure
    {
        return function (string $attribute, mixed $value, \Closure $fail): void {
            $normalized = UrlRedirect::normalizeSourceFromUserInput((string) $value);
            if (strlen($normalized) > 512) {
                $fail('The old URL path is too long (max 512 characters).');
            }
        };
    }
}
