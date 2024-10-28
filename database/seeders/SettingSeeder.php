<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory()->create([
            'url' => 'www.opensook.ma',
            'title' => 'السوق المفتوح',
            'title2' => 'السوق المفتوح',
            'meta' => '',
            'tags' => '',
            'intro' => '',
            'emailadmin' => 'contact@opensook.ma',
            'mobileadmin' => '000 000 000 000',
            'smtp' => 'mail.opensook.ma',
            'smtpport' => '456',
            'ssltls' => '1',
            'emailresponse' => 'noreplay@opensook.ma',
            'passwordemailresponse' => 'noreplay@opensook.ma',
            'copyright' => '2024 OpenSook.ma',
            'description' => '',
            'msgclose' => '',
            'header' => '',
            'footer' => '',
            'msgaddproductstatus' => '0',
            'msgaddproduct' => '',
            'msgactivationmobile' => '',
            'advice' => '',
            'ipapi' => '1',
            'timeadnoregister' => '1',
            'timeadregister' => '2',
            'numberadsspecialuser' => '0',
            'conditionnumberadsspecialuser' => '1',
            'anonymousad' => '0',
            'showadanonymous' => '0',
            'showadusers' => '0',
            'showstoreusers' => '0',
            'showcomments' => '0',
            'removecommentonlyspecial' => '0',
            'republishspecialonly' => '0',
            'allowfilter' => '1',
            'allowslider' => '1',
            'allowmobilepack' => '1',
            'allowsms' => '0',
            'apn' => '',
            'apnuser' => '',
            'apnpassword' => '',
            'apnname' => '',
            'forceactivatemobile' => '0',
            'nbrtentativemobile' => '2',
            'nbrfreesms' => '2',
            'nbrcategoriesmobile' => '10',
            'forceactivateemail' => '1',
            'allowcash' => '1',
            'commission' => '0',
            'commissionvalue' => '1',
            'instagram' => '',
            'facebook' => '',
            'twitter' => '',
            'googleplay' => '',
            'appstore' => '',
            'loginsocialmedia' => '0',
            'paymentgateways' => '0',
            'enabletags' => '0',
            'recaptcha' => '1',
            'recaptchasitekey' => '',
            'recaptchasecretkey' => '',
        ]);
    }
}
