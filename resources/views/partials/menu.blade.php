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
                    <li class="nav-item has-treeview {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
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
                        </ul>
                    </li>
                @endcan
                @can('product_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/products*") ? "menu-open" : "" }} {{ request()->is("admin/categories*") ? "menu-open" : "" }} {{ request()->is("admin/ingredients*") ? "menu-open" : "" }} {{ request()->is("admin/variations-sizes*") ? "menu-open" : "" }} {{ request()->is("admin/crusts*") ? "menu-open" : "" }} {{ request()->is("admin/product-variation-sizes*") ? "menu-open" : "" }} {{ request()->is("admin/product-crust-sizes*") ? "menu-open" : "" }}">
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
                        </ul>
                    </li>
                @endcan
                @can('menu_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/dishes*") ? "menu-open" : "" }} {{ request()->is("admin/dish-ingredients*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-utensils">

                            </i>
                            <p>
                                {{ trans('cruds.menuManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('dish_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dishes.index") }}" class="nav-link {{ request()->is("admin/dishes") || request()->is("admin/dishes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-stroopwafel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dish.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('dish_ingredient_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dish-ingredients.index") }}" class="nav-link {{ request()->is("admin/dish-ingredients") || request()->is("admin/dish-ingredients/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cookie">

                                        </i>
                                        <p>
                                            {{ trans('cruds.dishIngredient.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
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
                @can('customer_management_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.customer-managements.index") }}" class="nav-link {{ request()->is("admin/customer-managements") || request()->is("admin/customer-managements/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-user-friends">

                            </i>
                            <p>
                                {{ trans('cruds.customerManagement.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('address_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.addresses.index") }}" class="nav-link {{ request()->is("admin/addresses") || request()->is("admin/addresses/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-location-arrow">

                            </i>
                            <p>
                                {{ trans('cruds.address.title') }}
                            </p>
                        </a>
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