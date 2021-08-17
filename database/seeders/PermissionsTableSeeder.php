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
                'title' => 'dish_create',
            ],
            [
                'id'    => 53,
                'title' => 'dish_edit',
            ],
            [
                'id'    => 54,
                'title' => 'dish_show',
            ],
            [
                'id'    => 55,
                'title' => 'dish_delete',
            ],
            [
                'id'    => 56,
                'title' => 'dish_access',
            ],
            [
                'id'    => 57,
                'title' => 'dish_ingredient_create',
            ],
            [
                'id'    => 58,
                'title' => 'dish_ingredient_edit',
            ],
            [
                'id'    => 59,
                'title' => 'dish_ingredient_show',
            ],
            [
                'id'    => 60,
                'title' => 'dish_ingredient_delete',
            ],
            [
                'id'    => 61,
                'title' => 'dish_ingredient_access',
            ],
            [
                'id'    => 62,
                'title' => 'order_create',
            ],
            [
                'id'    => 63,
                'title' => 'order_edit',
            ],
            [
                'id'    => 64,
                'title' => 'order_show',
            ],
            [
                'id'    => 65,
                'title' => 'order_delete',
            ],
            [
                'id'    => 66,
                'title' => 'order_access',
            ],
            [
                'id'    => 67,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 68,
                'title' => 'menu_management_access',
            ],
            [
                'id'    => 69,
                'title' => 'customer_management_create',
            ],
            [
                'id'    => 70,
                'title' => 'customer_management_edit',
            ],
            [
                'id'    => 71,
                'title' => 'customer_management_show',
            ],
            [
                'id'    => 72,
                'title' => 'customer_management_delete',
            ],
            [
                'id'    => 73,
                'title' => 'customer_management_access',
            ],
            [
                'id'    => 74,
                'title' => 'address_create',
            ],
            [
                'id'    => 75,
                'title' => 'address_edit',
            ],
            [
                'id'    => 76,
                'title' => 'address_show',
            ],
            [
                'id'    => 77,
                'title' => 'address_delete',
            ],
            [
                'id'    => 78,
                'title' => 'address_access',
            ],
            [
                'id'    => 79,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 80,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 81,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 82,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 83,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 84,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
