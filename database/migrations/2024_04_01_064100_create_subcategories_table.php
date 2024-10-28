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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->longText('icon')->nullable();
            $table->longText('name_1')->nullable();
            $table->longText('name_2')->nullable();
            $table->bigInteger('category')->default(0);
            $table->boolean('has_sub_sub_category')->default(0);
            $table->bigInteger('added_by')->default(0);
            $table->boolean('removed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
