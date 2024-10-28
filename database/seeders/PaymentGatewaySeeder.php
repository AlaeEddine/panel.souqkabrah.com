<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentGateway;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class PaymentGatewaySeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PaymentGateway::factory()->create([
            'icon' => 'fab fa-paypal',
            'name' => 'PayPal',
            'description' => 'PayPal',
            'checkpoint_url' => '',
            'response_callback_ok' => '/success',
            'response_callback_unknown' => '/unknown',
            'response_callback_nok' => '/error',
            'api_sandbox' => '/sandbox',
            'api_port' => '443',
            'api_email' => 'email@paypal.com',
            'api_username' => 'user@paypal.com',
            'api_password' => 'password',
            'valide' => 1,
            'removed' => 0,
        ]);

        PaymentGateway::factory()->create([
            'icon' => 'fa fa-building-columns',
            'name' => 'Cashu',
            'description' => 'Cashu',
            'checkpoint_url' => '',
            'response_callback_ok' => '/success',
            'response_callback_unknown' => '/unknown',
            'response_callback_nok' => '/error',
            'api_sandbox' => '/sandbox',
            'api_port' => '443',
            'api_email' => 'email@cashu.com',
            'api_username' => 'user@cashu.com',
            'api_password' => 'password',
            'valide' => 1,
            'removed' => 0,
        ]);
    }
}
