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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_owner')->default(0);
            $table->longText('name_owner')->nullable();
            $table->longText('email_owner')->nullable();
            $table->longText('mobile_owner')->nullable();
            $table->longText('whatsapp_owner')->nullable();
            $table->bigInteger('id_country')->default(0);
            $table->longText('name_country')->nullable();
            $table->bigInteger('id_city')->default(0);
            $table->longText('name_city')->nullable();
            $table->longText('name')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('id_category')->default(0);
            $table->longText('name_category')->nullable();
            $table->bigInteger('id_subcategory')->default(0);
            $table->longText('name_subcategory')->nullable();
            $table->bigInteger('id_subsubcategory')->default(0);
            $table->longText('name_subsubcategory')->nullable();
            $table->boolean('special')->default(0);
            $table->boolean('valide')->default(0);
            $table->boolean('archived')->default(0);
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
        Schema::dropIfExists('stores');
    }
};
