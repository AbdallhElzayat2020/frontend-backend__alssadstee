<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing pages or create new ones
        $pages = [
            [
                'page_key' => 'contact-us',
                'slug_en' => 'contact-us',
                'slug_ar' => 'اتصل-بنا',
                'meta_title_en' => 'Contact Us',
                'meta_title_ar' => 'اتصل بنا',
                'meta_description_en' => 'Get in touch with us',
                'meta_description_ar' => 'تواصل معنا',
            ],
            [
                'page_key' => 'jobs',
                'slug_en' => 'jobs',
                'slug_ar' => 'الوظائف',
                'meta_title_en' => 'Jobs',
                'meta_title_ar' => 'الوظائف',
                'meta_description_en' => 'Join our team',
                'meta_description_ar' => 'انضم إلى فريقنا',
            ],
            [
                'page_key' => 'quote',
                'slug_en' => 'quote',
                'slug_ar' => 'طلب-عرض-سعر',
                'meta_title_en' => 'Request Quote',
                'meta_title_ar' => 'طلب عرض سعر',
                'meta_description_en' => 'Request a quote for our services',
                'meta_description_ar' => 'اطلب عرض سعر لخدماتنا',
            ],
        ];

        foreach ($pages as $page) {
            \DB::table('static_page_seos')->updateOrInsert(
                ['page_key' => $page['page_key']],
                array_merge($page, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::table('static_page_seos')->whereIn('page_key', ['contact-us', 'jobs', 'quote'])->delete();
    }
};
