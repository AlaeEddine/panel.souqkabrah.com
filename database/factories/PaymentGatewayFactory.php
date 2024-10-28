<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PaymentGatewayFactory extends Factory
{

    public function definition(): array
    {
        return [
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
        ];
    }

}
