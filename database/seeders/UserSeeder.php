<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $Users = User::factory(20)->create();
        foreach($Users as $User):
            $User->assignRole('User');
        endforeach;
        foreach (User::where('level','1')->get() as $Customer):
            $Customer->assignRole('Customer');
        endforeach;
        foreach (User::where('level','2')->get() as $Seller):
            $Seller->assignRole('Seller');
        endforeach;
        $Admins = User::factory()->create([
            'name' => 'المدير العام',
            'adress' => 'العنوان',
            'phone' => '000 000 000',
            'email' => 'email@domain.com',
            'password' => Hash::make('email@domain.com'),
            'isAdmin' => true,
            'level' => 2, // LEVEL 0 = User, 1 = Admin, 2 = Super Admin, 3 = Customer, 4 = Seller
            'role' => 'Admin',
            'removed' => '0',
        ]);
        $Admins->assignRole('Admin');

        $SuperAdmins = User::factory()->create([
            'name' => 'Alae-Eddine SAFFIH',
            'adress' => 'العنوان',
            'phone' => '000 000 000',
            'email' => 'alae.saf@gmail.com',
            'password' => Hash::make('www.opensook.ma'),
            'isAdmin' => true,
            'level' => 3, // LEVEL 0 = User, 1 = Admin, 2 = Super Admin, 3 = Customer, 4 = Seller
            'role' => 'SuperAdmin',
            'removed' => '0',
        ]);
        $SuperAdmins->assignRole('SuperAdmin');
    }
}
