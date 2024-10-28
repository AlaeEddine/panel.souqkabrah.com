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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->longText('name_1')->nullable();
            $table->longText('name_2')->nullable();
            $table->longText('price1')->nullable();
            $table->longText('finalprice')->nullable();
            $table->bigInteger('category')->default(0);
            $table->bigInteger('subcategory')->default(0);
            $table->bigInteger('subsubcategory')->default(0);
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
        Schema::dropIfExists('products');
    }
};
