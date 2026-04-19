<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('static_page_seos')) {
            $toDrop = [];
            foreach (['slug_en', 'slug_ar'] as $column) {
                if (Schema::hasColumn('static_page_seos', $column)) {
                    $toDrop[] = $column;
                }
            }
            if ($toDrop !== []) {
                Schema::table('static_page_seos', function (Blueprint $table) use ($toDrop): void {
                    $table->dropColumn($toDrop);
                });
            }
        }

        if (! Schema::hasTable('products')) {
            return;
        }

        $products = DB::table('products')->select('id', 'slug')->get();
        foreach ($products as $row) {
            $raw = $row->slug;
            if ($raw === null || $raw === '') {
                continue;
            }
            $plain = $raw;
            if (is_string($raw) && str_starts_with(ltrim($raw), '{')) {
                $decoded = json_decode($raw, true);
                if (is_array($decoded)) {
                    $plain = $decoded['en'] ?? $decoded['ar'] ?? reset($decoded) ?? $raw;
                }
            }
            $plain = is_string($plain) ? trim($plain) : (string) $plain;
            if ($plain !== '') {
                DB::table('products')->where('id', $row->id)->update(['slug' => $plain]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('static_page_seos', function (Blueprint $table) {
            $table->string('slug_en')->nullable()->after('page_key');
            $table->string('slug_ar')->nullable()->after('slug_en');
        });
    }
};
