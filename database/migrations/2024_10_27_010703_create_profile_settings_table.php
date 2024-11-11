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
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->integer('card_opacity')->default(100);
            $table->boolean('show_uid')->default(true);
            $table->boolean('show_views')->default(true);
            $table->string('avatar')->nullable();
            $table->string('background_image')->nullable();
            $table->string('background_effect')->nullable();
            $table->string('username_effect')->nullable();
            $table->string('background_color')->nullable()->default('#060606');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_settings');
    }
};
