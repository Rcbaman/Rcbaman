<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'first_name'               => 'First Name',
            'first_name_helper'        => ' ',
            'last_name'                => 'Last Name',
            'last_name_helper'         => ' ',
            'country'                  => 'Country',
            'country_helper'           => ' ',
            'profile_photo'            => 'Profile Photo',
            'profile_photo_helper'     => ' ',
            'mobile_number'            => 'Mobile Number',
            'mobile_number_helper'     => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'icon'               => 'Icon',
            'icon_helper'        => ' ',
            'image'              => 'Image',
            'image_helper'       => ' ',
            'slug'               => 'Slug',
            'slug_helper'        => ' ',
        ],
    ],
    'ingredient' => [
        'title'          => 'Ingredients',
        'title_singular' => 'Ingredient',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
        ],
    ],
    'variationsSize' => [
        'title'          => 'Variations Sizes',
        'title_singular' => 'Variations Size',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
        ],
    ],
    'crust' => [
        'title'          => 'Crusts',
        'title_singular' => 'Crust',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
        ],
    ],
    'product' => [
        'title'          => 'Products',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'regular_price'        => 'Regular Price',
            'regular_price_helper' => ' ',
            'sale_price'           => 'Sale Price',
            'sale_price_helper'    => ' ',
            'variations'           => 'Variations',
            'variations_helper'    => ' ',
            'image'                => 'Image',
            'image_helper'         => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'multi_images'         => 'Multi Images',
            'multi_images_helper'  => ' ',
            'category'             => 'Category',
            'category_helper'      => ' ',
            'profile'              => 'Profile',
            'profile_helper'       => ' ',
        ],
    ],
    'order' => [
        'title'          => 'Orders',
        'title_singular' => 'Order',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'total_amount'        => 'Total Amount',
            'total_amount_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'order_status'        => 'Order Status',
            'order_status_helper' => ' ',
            'transaction'         => 'Transaction',
            'transaction_helper'  => ' ',
            'customer'            => 'Customer',
            'customer_helper'     => ' ',
            'ordertakenby'        => 'Ordertakenby',
            'ordertakenby_helper' => ' ',
        ],
    ],
    'productManagement' => [
        'title'          => 'Product Management',
        'title_singular' => 'Product Management',
    ],
    'menuManagement' => [
        'title'          => 'Menu Management',
        'title_singular' => 'Menu Management',
    ],
    'transaction' => [
        'title'          => 'Transactions',
        'title_singular' => 'Transaction',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'amount'               => 'Amount',
            'amount_helper'        => ' ',
            'status'               => 'Status',
            'status_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'method'               => 'Method',
            'method_helper'        => ' ',
            'sub_total'            => 'Sub Total',
            'sub_total_helper'     => ' ',
            'tax'                  => 'Tax',
            'tax_helper'           => ' ',
            'other_charges'        => 'Other Charges',
            'other_charges_helper' => ' ',
        ],
    ],
    'customerDetail' => [
        'title'          => 'Customer Details',
        'title_singular' => 'Customer Detail',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'first_name'           => 'First Name',
            'first_name_helper'    => ' ',
            'last_name'            => 'Last Name',
            'last_name_helper'     => ' ',
            'email'                => 'Email',
            'email_helper'         => ' ',
            'mobile_number'        => 'Mobile Number',
            'mobile_number_helper' => ' ',
            'dob'                  => 'Dob',
            'dob_helper'           => ' ',
            'gender'               => 'Gender',
            'gender_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'customersManagement' => [
        'title'          => 'Customers Management',
        'title_singular' => 'Customers Management',
    ],
    'customerAddress' => [
        'title'          => 'Customer Addresses',
        'title_singular' => 'Customer Address',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'customer'          => 'Customer',
            'customer_helper'   => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'address_2'         => 'Address 2',
            'address_2_helper'  => ' ',
            'country'           => 'Country',
            'country_helper'    => ' ',
            'state'             => 'State',
            'state_helper'      => ' ',
            'zip'               => 'Zip',
            'zip_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'accountsManagement' => [
        'title'          => 'Accounts Management',
        'title_singular' => 'Accounts Management',
    ],
    'taxProfile' => [
        'title'          => 'Tax Profiles',
        'title_singular' => 'Tax Profile',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
        ],
    ],
    'productIngredient' => [
        'title'          => 'Product Ingredients',
        'title_singular' => 'Product Ingredient',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'product'            => 'Product',
            'product_helper'     => ' ',
            'ingredients'        => 'Ingredients',
            'ingredients_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'log' => [
        'title'          => 'Logs',
        'title_singular' => 'Log',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'user'               => 'User',
            'user_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'uuid'               => 'Uuid',
            'uuid_helper'        => ' ',
            'device_ip'          => 'Device Ip',
            'device_ip_helper'   => ' ',
            'device_type'        => 'Device Type',
            'device_type_helper' => ' ',
            'action'             => 'Action',
            'action_helper'      => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'key'               => 'Key',
            'key_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
        ],
    ],
    'productProfile' => [
        'title'          => 'Product Profiles',
        'title_singular' => 'Product Profile',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'crustSize' => [
        'title'          => 'Crust Sizes',
        'title_singular' => 'Crust Size',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'crust'             => 'Crust',
            'crust_helper'      => ' ',
            'size'              => 'Size',
            'size_helper'       => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'ingredientsSize' => [
        'title'          => 'Ingredients Size',
        'title_singular' => 'Ingredients Size',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'ingredient'        => 'Ingredient',
            'ingredient_helper' => ' ',
            'size'              => 'Size',
            'size_helper'       => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'productSize' => [
        'title'          => 'Product Sizes',
        'title_singular' => 'Product Size',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'product'           => 'Product',
            'product_helper'    => ' ',
            'size'              => 'Size',
            'size_helper'       => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
