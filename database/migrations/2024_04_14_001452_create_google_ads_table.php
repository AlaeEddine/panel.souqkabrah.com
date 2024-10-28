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
        Schema::create('google_ads', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('position')->nullable();
            $table->longText('css')->nullable();
            $table->longText('js')->nullable();
            $table->longText('html')->nullable();
            $table->dateTime('date_start')->default(date('Y-m-d H:i:s'));
            $table->dateTime('date_end')->nullable(date('Y-m-d H:i:s'));
            $table->boolean('valide')->default(0);
            $table->boolean('removed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_ads');
    }
};
