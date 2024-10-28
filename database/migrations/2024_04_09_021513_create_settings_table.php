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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->longText('url')->nullable();
            $table->longText('title')->nullable();
            $table->longText('title2')->nullable();
            $table->longText('meta')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('intro')->nullable();
            $table->longText('emailadmin')->nullable();
            $table->longText('mobileadmin')->nullable();
            $table->longText('smtp')->nullable();
            $table->longText('smtpport')->nullable();
            $table->longText('ssltls')->nullable();
            $table->longText('emailresponse')->nullable();
            $table->longText('passwordemailresponse')->nullable();
            $table->longText('copyright')->nullable();
            $table->longText('description')->nullable();
            $table->longText('msgclose')->nullable();
            $table->longText('header')->nullable();
            $table->longText('footer')->nullable();
            $table->longText('msgaddproductstatus')->nullable();
            $table->longText('msgaddproduct')->nullable();
            $table->longText('msgactivationmobile')->nullable();
            $table->longText('advice')->nullable();
            $table->longText('ipapi')->nullable();
            $table->longText('timeadnoregister')->nullable();
            $table->longText('timeadregister')->nullable();
            $table->longText('numberadsspecialuser')->nullable();
            $table->longText('conditionnumberadsspecialuser')->nullable();
            $table->longText('anonymousad')->nullable();
            $table->longText('showadanonymous')->nullable();
            $table->longText('showadusers')->nullable();
            $table->longText('showstoreusers')->nullable();
            $table->longText('showcomments')->nullable();
            $table->longText('removecommentonlyspecial')->nullable();
            $table->longText('republishspecialonly')->nullable();
            $table->longText('allowfilter')->nullable();
            $table->longText('allowslider')->nullable();
            $table->longText('allowmobilepack')->nullable();
            $table->longText('allowsms')->nullable();
            $table->longText('apn')->nullable();
            $table->longText('apnuser')->nullable();
            $table->longText('apnpassword')->nullable();
            $table->longText('apnname')->nullable();
            $table->longText('forceactivatemobile')->nullable();
            $table->longText('nbrtentativemobile')->nullable();
            $table->longText('nbrfreesms')->nullable();
            $table->longText('nbrcategoriesmobile')->nullable();
            $table->longText('forceactivateemail')->nullable();
            $table->longText('allowcash')->nullable();
            $table->longText('commission')->nullable();
            $table->longText('commissionvalue')->nullable();
            $table->longText('googlemapskey')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('googleplay')->nullable();
            $table->longText('appstore')->nullable();
            $table->longText('loginsocialmedia')->nullable();
            $table->longText('paymentgateways')->nullable();
            $table->longText('enabletags')->nullable();
            $table->longText('recaptcha')->nullable();
            $table->longText('recaptchasitekey')->nullable();
            $table->longText('recaptchasecretkey')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
