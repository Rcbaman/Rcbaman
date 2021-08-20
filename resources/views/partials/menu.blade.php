<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.logs.index") }}" class="nav-link {{ request()->is("admin/logs") || request()->is("admin/logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-fingerprint">

                                        </i>
                                        <p>
                                            {{ trans('cruds.log.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/categories*") ? "menu-open" : "" }} {{ request()->is("admin/ingredients*") ? "menu-open" : "" }} {{ request()->is("admin/variations-sizes*") ? "menu-open" : "" }} {{ request()->is("admin/crusts*") ? "menu-open" : "" }} {{ request()->is("admin/product-variation-sizes*") ? "menu-open" : "" }} {{ request()->is("admin/product-crust-sizes*") ? "menu-open" : "" }} {{ request()->is("admin/product-ingredients*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-archive">

                            </i>
                            <p>
                                {{ trans('cruds.productManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('product_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-product-hunt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.product.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-beer">

                                        </i>
                                        <p>
                                            {{ trans('cruds.category.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ingredient_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ingredients.index") }}" class="nav-link {{ request()->is("admin/ingredients") || request()->is("admin/ingredients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.ingredient.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('variations_size_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.variations-sizes.index") }}" class="nav-link {{ request()->is("admin/variations-sizes") || request()->is("admin/variations-sizes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-brush">

                                        </i>
                                        <p>
                                            {{ trans('cruds.variationsSize.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('crust_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.crusts.index") }}" class="nav-link {{ request()->is("admin/crusts") || request()->is("admin/crusts/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-mortar-pestle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.crust.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_variation_size_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-variation-sizes.index") }}" class="nav-link {{ request()->is("admin/product-variation-sizes") || request()->is("admin/product-variation-sizes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-product-hunt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productVariationSize.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_crust_size_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-crust-sizes.index") }}" class="nav-link {{ request()->is("admin/product-crust-sizes") || request()->is("admin/product-crust-sizes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-box">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productCrustSize.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('product_ingredient_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.product-ingredients.index") }}" class="nav-link {{ request()->is("admin/product-ingredients") || request()->is("admin/product-ingredients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-umbrella">

                                        </i>
                                        <p>
                                            {{ trans('cruds.productIngredient.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('customers_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/customer-details*") ? "menu-open" : "" }} {{ request()->is("admin/customer-addresses*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users-cog">

                            </i>
                            <p>
                                {{ trans('cruds.customersManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('customer_detail_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.customer-details.index") }}" class="nav-link {{ request()->is("admin/customer-details") || request()->is("admin/customer-details/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.customerDetail.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('customer_address_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.customer-addresses.index") }}" class="nav-link {{ request()->is("admin/customer-addresses") || request()->is("admin/customer-addresses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-location-arrow">

                                        </i>
                                        <p>
                                            {{ trans('cruds.customerAddress.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('accounts_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/orders*") ? "menu-open" : "" }} {{ request()->is("admin/transactions*") ? "menu-open" : "" }} {{ request()->is("admin/tax-profiles*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.accountsManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('order_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.orders.index") }}" class="nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chess-king">

                                        </i>
                                        <p>
                                            {{ trans('cruds.order.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transaction_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transactions.index") }}" class="nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-bill-wave">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transaction.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tax_profile_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tax-profiles.index") }}" class="nav-link {{ request()->is("admin/tax-profiles") || request()->is("admin/tax-profiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.taxProfile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>