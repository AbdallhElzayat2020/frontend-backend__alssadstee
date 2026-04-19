<?php

namespace App\Http\Requests\Concerns;

use App\Models\Product;
use App\Models\UrlRedirect;

trait ValidatesProductRedirectTarget
{
    protected function productRedirectTargetExistsRule(): \Closure
    {
        return function (string $attribute, mixed $value, \Closure $fail): void {
            $raw = trim((string) $value);
            if ($raw === '' || preg_match('#^https?://#i', $raw)) {
                return;
            }
            $stored = UrlRedirect::normalizeTargetForStorage($raw);
            if (preg_match('#^/products/([^/]+)$#', $stored, $m)) {
                $slug = $m[1];
                if (! Product::query()->where('slug', $slug)->exists()) {
                    $fail("No product has slug \"{$slug}\". Add the product in the dashboard or change the New URL — otherwise visitors will get 404.");
                }
            }
        };
    }
}
