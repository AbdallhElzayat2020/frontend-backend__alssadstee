<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('static_page_seos', function (Blueprint $table) {
            $table->id();
            $table->string('page_key')->unique();
            $table->string('meta_title_ar')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->string('meta_keywords_ar')->nullable();
            $table->string('meta_keywords_en')->nullable();
            $table->string('canonical_url_ar')->nullable();
            $table->string('canonical_url_en')->nullable();
            $table->longText('schema_markup_ar')->nullable();
            $table->longText('schema_markup_en')->nullable();
            $table->timestamps();
        });

        $keys = [
            'home',
            'about',
            'contact-us',
            'facilities',
            'faqs',
            'integrated-system',
            'jobs',
            'media',
            'products',
            'quality',
            'quote',
        ];

        $now = now();
        foreach ($keys as $key) {
            DB::table('static_page_seos')->insert([
                'page_key' => $key,
                'meta_title_ar' => null,
                'meta_title_en' => null,
                'meta_description_ar' => null,
                'meta_description_en' => null,
                'meta_keywords_ar' => null,
                'meta_keywords_en' => null,
                'canonical_url_ar' => null,
                'canonical_url_en' => null,
                'schema_markup_ar' => null,
                'schema_markup_en' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('static_page_seos');
    }
};
