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
        Schema::create('sms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_from')->default(0);
            $table->longText('name_from')->nullable();
            $table->longText('email_from')->nullable();
            $table->longText('phone_from')->nullable();
            $table->bigInteger('id_to')->default(0);
            $table->longText('name_to')->nullable();
            $table->longText('email_to')->nullable();
            $table->longText('phone_to')->nullable();
            $table->longText('sms')->nullable();
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
        Schema::dropIfExists('sms');
    }
};
