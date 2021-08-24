<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'ingredient_create',
            ],
            [
                'id'    => 23,
                'title' => 'ingredient_edit',
            ],
            [
                'id'    => 24,
                'title' => 'ingredient_show',
            ],
            [
                'id'    => 25,
                'title' => 'ingredient_delete',
            ],
            [
                'id'    => 26,
                'title' => 'ingredient_access',
            ],
            [
                'id'    => 27,
                'title' => 'variations_size_create',
            ],
            [
                'id'    => 28,
                'title' => 'variations_size_edit',
            ],
            [
                'id'    => 29,
                'title' => 'variations_size_show',
            ],
            [
                'id'    => 30,
                'title' => 'variations_size_delete',
            ],
            [
                'id'    => 31,
                'title' => 'variations_size_access',
            ],
            [
                'id'    => 32,
                'title' => 'crust_create',
            ],
            [
                'id'    => 33,
                'title' => 'crust_edit',
            ],
            [
                'id'    => 34,
                'title' => 'crust_show',
            ],
            [
                'id'    => 35,
                'title' => 'crust_delete',
            ],
            [
                'id'    => 36,
                'title' => 'crust_access',
            ],
            [
                'id'    => 37,
                'title' => 'product_create',
            ],
            [
                'id'    => 38,
                'title' => 'product_edit',
            ],
            [
                'id'    => 39,
                'title' => 'product_show',
            ],
            [
                'id'    => 40,
                'title' => 'product_delete',
            ],
            [
                'id'    => 41,
                'title' => 'product_access',
            ],
            [
                'id'    => 42,
                'title' => 'product_variation_size_create',
            ],
            [
                'id'    => 43,
                'title' => 'product_variation_size_edit',
            ],
            [
                'id'    => 44,
                'title' => 'product_variation_size_show',
            ],
            [
                'id'    => 45,
                'title' => 'product_variation_size_delete',
            ],
            [
                'id'    => 46,
                'title' => 'product_variation_size_access',
            ],
            [
                'id'    => 47,
                'title' => 'product_crust_size_create',
            ],
            [
                'id'    => 48,
                'title' => 'product_crust_size_edit',
            ],
            [
                'id'    => 49,
                'title' => 'product_crust_size_show',
            ],
            [
                'id'    => 50,
                'title' => 'product_crust_size_delete',
            ],
            [
                'id'    => 51,
                'title' => 'product_crust_size_access',
            ],
            [
                'id'    => 52,
                'title' => 'order_create',
            ],
            [
                'id'    => 53,
                'title' => 'order_edit',
            ],
            [
                'id'    => 54,
                'title' => 'order_show',
            ],
            [
                'id'    => 55,
                'title' => 'order_delete',
            ],
            [
                'id'    => 56,
                'title' => 'order_access',
            ],
            [
                'id'    => 57,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 58,
                'title' => 'menu_management_access',
            ],
            [
                'id'    => 59,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 60,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 61,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 62,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 63,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 64,
                'title' => 'customer_detail_create',
            ],
            [
                'id'    => 65,
                'title' => 'customer_detail_edit',
            ],
            [
                'id'    => 66,
                'title' => 'customer_detail_show',
            ],
            [
                'id'    => 67,
                'title' => 'customer_detail_delete',
            ],
            [
                'id'    => 68,
                'title' => 'customer_detail_access',
            ],
            [
                'id'    => 69,
                'title' => 'customers_management_access',
            ],
            [
                'id'    => 70,
                'title' => 'customer_address_create',
            ],
            [
                'id'    => 71,
                'title' => 'customer_address_edit',
            ],
            [
                'id'    => 72,
                'title' => 'customer_address_show',
            ],
            [
                'id'    => 73,
                'title' => 'customer_address_delete',
            ],
            [
                'id'    => 74,
                'title' => 'customer_address_access',
            ],
            [
                'id'    => 75,
                'title' => 'accounts_management_access',
            ],
            [
                'id'    => 76,
                'title' => 'tax_profile_create',
            ],
            [
                'id'    => 77,
                'title' => 'tax_profile_edit',
            ],
            [
                'id'    => 78,
                'title' => 'tax_profile_show',
            ],
            [
                'id'    => 79,
                'title' => 'tax_profile_delete',
            ],
            [
                'id'    => 80,
                'title' => 'tax_profile_access',
            ],
            [
                'id'    => 81,
                'title' => 'product_ingredient_create',
            ],
            [
                'id'    => 82,
                'title' => 'product_ingredient_edit',
            ],
            [
                'id'    => 83,
                'title' => 'product_ingredient_show',
            ],
            [
                'id'    => 84,
                'title' => 'product_ingredient_delete',
            ],
            [
                'id'    => 85,
                'title' => 'product_ingredient_access',
            ],
            [
                'id'    => 86,
                'title' => 'log_create',
            ],
            [
                'id'    => 87,
                'title' => 'log_edit',
            ],
            [
                'id'    => 88,
                'title' => 'log_show',
            ],
            [
                'id'    => 89,
                'title' => 'log_delete',
            ],
            [
                'id'    => 90,
                'title' => 'log_access',
            ],
            [
                'id'    => 91,
                'title' => 'setting_create',
            ],
            [
                'id'    => 92,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 93,
                'title' => 'setting_show',
            ],
            [
                'id'    => 94,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 95,
                'title' => 'setting_access',
            ],
            [
                'id'    => 96,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 97,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 98,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 99,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 100,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 101,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
