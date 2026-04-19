<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Convert existing slug to JSON format for Spatie Translatable
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            $currentSlug = $product->slug;
            
            // Convert to translatable JSON format
            $translatableSlug = json_encode([
                'en' => $currentSlug,
                'ar' => $currentSlug, // Keep same for now, can be changed later
            ]);
            
            DB::table('products')
                ->where('id', $product->id)
                ->update(['slug' => $translatableSlug]);
        }
    }

    public function down(): void
    {
        // Convert back from JSON to simple string (using English version)
        $products = DB::table('products')->get();
        
        foreach ($products as $product) {
            $slugData = json_decode($product->slug, true);
            $englishSlug = $slugData['en'] ?? $product->slug;
            
            DB::table('products')
                ->where('id', $product->id)
                ->update(['slug' => $englishSlug]);
        }
    }
};