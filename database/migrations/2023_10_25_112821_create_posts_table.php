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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->String('title')->nullable();
            $table->longtext('description')->nullable();
            $table->String('image')->nullable();
            $table->String('name')->nullable();
            $table->String('user_id')->nullable();
            $table->String('post_status')->nullable();
            $table->String('usertype')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
