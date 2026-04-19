<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('url_redirects', function (Blueprint $table) {
            $table->id();
            $table->string('source_path', 512)->unique();
            $table->string('target_url', 2048);
            $table->string('redirect_type', 3)->default('301');
            $table->string('status', 16)->default('active');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('hits_count')->default(0);
            $table->timestamp('last_hit_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('url_redirects');
    }
};
