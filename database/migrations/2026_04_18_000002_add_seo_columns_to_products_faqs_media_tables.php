<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        foreach (['products', 'faqs', 'media'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
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
            });
        }
    }

    public function down(): void
    {
        foreach (['products', 'faqs', 'media'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn([
                    'meta_title_ar',
                    'meta_title_en',
                    'meta_description_ar',
                    'meta_description_en',
                    'meta_keywords_ar',
                    'meta_keywords_en',
                    'canonical_url_ar',
                    'canonical_url_en',
                    'schema_markup_ar',
                    'schema_markup_en',
                ]);
            });
        }
    }
};
