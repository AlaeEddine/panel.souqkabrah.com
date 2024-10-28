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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_from')->nullable();
            $table->bigInteger('name_from')->nullable();
            $table->bigInteger('phone_from')->nullable();
            $table->bigInteger('whatsapp_from')->nullable();
            $table->bigInteger('email_from')->nullable();
            $table->longText('position')->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('picture1')->nullable();
            $table->longText('picture2')->nullable();
            $table->longText('picture3')->nullable();
            $table->longText('picture4')->nullable();
            $table->longText('picture5')->nullable();
            $table->longText('picture6')->nullable();
            $table->longText('picture7')->nullable();
            $table->longText('picture8')->nullable();
            $table->longText('picture9')->nullable();
            $table->longText('picture10')->nullable();
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
        Schema::dropIfExists('banners');
    }
};
