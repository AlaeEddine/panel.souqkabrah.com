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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->nullable();
            $table->bigInteger('id_store')->default(0);
            $table->bigInteger('id_category')->default(0);
            $table->longText('name_category')->nullable();
            $table->bigInteger('id_subcategory')->default(0);
            $table->longText('name_subcategory')->nullable();
            $table->bigInteger('id_subsubcategory')->default(0);
            $table->longText('name_subsubcategory')->nullable();
            $table->bigInteger('id_country')->default(0);
            $table->longText('name_country')->nullable();
            $table->bigInteger('id_city')->default(0);
            $table->longText('name_city')->nullable();
            $table->bigInteger('id_type')->default(0);
            $table->longText('name_type')->nullable();
            $table->boolean('fixed')->default(0);
            $table->bigInteger('id_contact')->default(0);
            $table->longText('name_contact')->nullable();
            $table->boolean('mazad')->default(0);
            $table->boolean('valide')->default(0);
            $table->boolean('allow_comments')->default(1);
            $table->longText('details')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('cover')->nullable();
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
            $table->boolean('banned')->default(0);
            $table->boolean('removed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
