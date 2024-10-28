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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->longText('icon')->nullable();
            $table->longText('name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('checkpoint_url')->nullable();
            $table->longText('response_callback_ok')->nullable();
            $table->longText('response_callback_unknown')->nullable();
            $table->longText('response_callback_nok')->nullable();
            $table->longText('api_sandbox')->nullable();
            $table->longText('api_port')->nullable();
            $table->longText('api_email')->nullable();
            $table->longText('api_username')->nullable();
            $table->longText('api_password')->nullable();
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
        Schema::dropIfExists('payment_gateways');
    }
};
