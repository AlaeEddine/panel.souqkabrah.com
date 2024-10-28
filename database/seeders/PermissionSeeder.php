<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $AdminPermissions = [
        'view-settings',                                    'update-settings',
        'view-contact',         'create-contact',           'update-contact',               'delete-contact',
        'view-roles',           'create-roles',             'update-roles',                 'delete-roles',
        'view-users',           'create-users',             'update-users',                 'delete-users',
        'view-cities',          'create-cities',            'update-cities',                'delete-cities',
        'view-categories',      'create-categories',        'update-categories',            'delete-categories',
        'view-subcategories',   'create-subcategories',     'update-subcategories',         'delete-subcategories',
        'view-subsubcategories','create-subsubcategories',  'update-subsubcategories',      'delete-subsubcategories',
        'view-private-messages','create-private-messages',  'update-private-messages',      'delete-private-messages',
        'view-ratings',         'create-ratings',           'update-ratings',               'delete-ratings',
        'view-likes',           'create-likes',             'update-likes',                 'delete-likes',
        'view-likers',          'create-likers',            'update-likers',                'delete-likers',
        'view-categories-liked','create-categories-liked',  'update-categories-liked',      'delete-categories-liked',
        'view-ads',             'create-ads',               'update-ads',                   'delete-ads',
        'view-banned-ads',      'create-banned-ads',        'update-banned-ads',            'delete-banned-ads',
        'view-filter-ads',      'create-filter-ads',        'update-filter-ads',            'delete-filter-ads',
        'view-comments',        'create-comments',          'update-comments',              'delete-comments',
        'view-banned-comments', 'create-banned-comments',   'update-banned-comments',       'delete-banned-comments',
        'view-stores',          'create-stores',            'update-stores',                'delete-stores',
        'view-payment-gateways','create-payment-gateways',  'update-payment-gateways',      'delete-payment-gateways',
        'view-money-transferts','create-money-transferts',  'update-money-transferts',      'delete-money-transferts',
        'view-banks',           'create-banks',             'update-banks',                 'delete-banks',
        'view-bank-transferts', 'create-bank-transferts',   'update-bank-transferts',       'delete-bank-transferts',
        'view-blacklist',       'create-blacklist',         'update-blacklist',             'delete-blacklist',
        'view-banners',         'create-banners',           'update-banners',               'delete-banners',
        'view-google-ads',      'create-google-ads',        'update-google-ads',            'delete-google-ads',
        'view-pages',           'create-pages',             'update-pages',                 'delete-pages',
        'view-mobile-data',     'create-mobile-data',       'update-mobile-data',           'delete-mobile-data',
        'view-sms-groups',      'create-sms-groups',        'update-sms-groups',            'delete-sms-groups',
        'view-sms',             'create-sms',               'update-sms',                   'delete-sms',
        'view-contact-users',   'create-contact-users',     'update-contact-users',         'delete-contact-users',
        'view-plans',           'create-plans',             'update-plans',                 'delete-plans',
        'view-social-media',    'create-social-media',      'update-social-media',          'delete-social-media',
        'view-html',            'create-html',              'update-html',                  'delete-html',
    ];

    private $SellerPermissions = ['view-cities', 'view-stores', 'create-stores', 'update-stores',        ];
    private $CustomerPermissions = ['view-cities'];
    private $UserPermissions = ['view-cities'];

    public function run(): void{
        foreach ($this->AdminPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $role0 = Role::create(['name' => 'User']); // LEVEL 0
        $role1 = Role::create(['name' => 'Admin']); // LEVEL 1
        $role2 = Role::create(['name' => 'SuperAdmin']); // LEVEL 2
        $role3 = Role::create(['name' => 'Customer']); // LEVEL 3
        $role4 = Role::create(['name' => 'Seller']); // LEVEL 4
        $AdminPermissions = Permission::pluck('id', 'id')->all();
        $role0->syncPermissions($this->UserPermissions);
        $role1->syncPermissions($AdminPermissions);
        $role2->syncPermissions($AdminPermissions);
        $role3->syncPermissions($this->CustomerPermissions);
        $role3->syncPermissions($this->SellerPermissions);

    }
}
