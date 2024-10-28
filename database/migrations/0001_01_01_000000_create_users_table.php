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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('adress')->nullable();
            $table->longText('login')->nullable();
            $table->longText('picture')->nullable();
            $table->bigInteger('id_country')->default(0);
            $table->longText('name_country')->nullable();
            $table->bigInteger('id_city')->default(0);
            $table->longText('name_city')->nullable();
            $table->bigInteger('id_bank')->default(0);
            $table->longText('name_bank')->nullable();
            $table->longText('account_bank')->nullable();
            $table->longText('whatsapp')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('phone_code')->nullable();
            $table->longText('sold')->nullable();
            $table->string('email')->unique();
            $table->longText('email_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('password');
            $table->enum('role',['User','Admin','SuperAdmin','Customer','Seller'])->default('User');
            $table->boolean('isAdmin')->default(false);
            $table->boolean('special_user')->default(false);
            $table->dateTime('special_start')->default(date('Y-m-d H:i:s'));
            $table->dateTime('special_end')->default(date('Y-m-d H:i:s'));
            $table->integer('attempts_validation_phone')->default(0);
            $table->integer('attempts_validation_email')->default(0);
            $table->boolean('phone_enabled')->default(false);
            $table->boolean('email_enabled')->default(false);
            $table->longText('plan')->nullable();
            $table->longText('level')->nullable();
            $table->longText('ip')->nullable();
            $table->longText('comission')->nullable();
            $table->boolean('banned')->default(false);
            $table->boolean('removed')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->longText('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->longText('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
