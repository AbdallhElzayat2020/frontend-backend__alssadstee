<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('static_page_seos', function (Blueprint $table) {
            $table->string('slug_en')->nullable()->after('page_key');
            $table->string('slug_ar')->nullable()->after('slug_en');
        });

        // Set default slugs for existing pages
        $defaultSlugs = [
            'home' => ['en' => '', 'ar' => ''],  // Home is root
            'about' => ['en' => 'about', 'ar' => 'عن-الشركة'],
            'contact-us' => ['en' => 'contact-us', 'ar' => 'اتصل-بنا'],
            'facilities' => ['en' => 'facilities', 'ar' => 'المرافق'],
            'faqs' => ['en' => 'faqs', 'ar' => 'اسئلة-شائعة'],
            'integrated-system' => ['en' => 'integrated-system', 'ar' => 'النظام-المتكامل'],
            'jobs' => ['en' => 'jobs', 'ar' => 'الوظائف'],
            'media' => ['en' => 'media', 'ar' => 'المعرض'],
            'products' => ['en' => 'products', 'ar' => 'المنتجات'],
            'quality' => ['en' => 'quality', 'ar' => 'الجودة'],
            'quote' => ['en' => 'quote', 'ar' => 'طلب-عرض-سعر'],
        ];

        foreach ($defaultSlugs as $pageKey => $slugs) {
            DB::table('static_page_seos')
                ->where('page_key', $pageKey)
                ->update([
                    'slug_en' => $slugs['en'],
                    'slug_ar' => $slugs['ar'],
                ]);
        }
    }

    public function down(): void
    {
        Schema::table('static_page_seos', function (Blueprint $table) {
            $table->dropColumn(['slug_en', 'slug_ar']);
        });
    }
};