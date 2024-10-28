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
        Schema::create('html', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_country')->default(0);
            $table->longText('name_country')->nullable();
            $table->longText('header')->nullable();
            $table->longText('footer')->nullable();
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
        Schema::dropIfExists('html');
    }
};
