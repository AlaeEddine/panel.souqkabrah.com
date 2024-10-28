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
        Schema::create('bank_transferts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_from')->default(0);
            $table->longText('name_from')->nullable();
            $table->longText('email_from')->nullable();
            $table->longText('phone_from')->nullable();
            $table->longText('account_from')->nullable();
            $table->bigInteger('id_to')->default(0);
            $table->longText('name_to')->nullable();
            $table->longText('email_to')->nullable();
            $table->longText('phone_to')->nullable();
            $table->longText('account_to')->nullable();
            $table->bigInteger('id_ads')->default(0);
            $table->longText('title_ads')->nullable();
            $table->bigInteger('id_country')->default(0);
            $table->longText('name_country')->nullable();
            $table->bigInteger('id_city')->default(0);
            $table->longText('name_city')->nullable();
            $table->bigInteger('id_catagory')->default(0);
            $table->longText('name_catagory')->nullable();
            $table->bigInteger('id_subcatagory')->default(0);
            $table->longText('name_subcatagory')->nullable();
            $table->bigInteger('id_subsubcatagory')->default(0);
            $table->longText('name_subsubcatagory')->nullable();
            $table->longText('price')->nullable();
            $table->boolean('done')->default(0);
            $table->boolean('removed')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_transferts');
    }
};
