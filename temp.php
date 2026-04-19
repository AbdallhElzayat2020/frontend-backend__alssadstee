<?php
require_once __DIR__ . '/vendor/autoload.php';
\ = require_once __DIR__ . '/bootstrap/app.php';
\->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\StaticPageSeo;

\ = [
    ['page_key' => 'contact-us', 'slug_en' => 'contact-us', 'slug_ar' => 'اتصل-بنا'],
    ['page_key' => 'jobs', 'slug_en' => 'jobs', 'slug_ar' => 'الوظائف'],
    ['page_key' => 'quote', 'slug_en' => 'quote', 'slug_ar' => 'طلب-عرض-سعر']
];

foreach (\ as \) {
    StaticPageSeo::updateOrCreate(['page_key' => \['page_key']], \);
    echo 'Added: ' . \['page_key'] . PHP_EOL;
}
echo 'Done!' . PHP_EOL;
