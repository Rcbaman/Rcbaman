@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.variationsSize.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.variations-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.variationsSize.fields.id') }}
                        </th>
                        <td>
                            {{ $variationsSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variationsSize.fields.name') }}
                        </th>
                        <td>
                            {{ $variationsSize->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.variationsSize.fields.slug') }}
                        </th>
                        <td>
                            {{ $variationsSize->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.variations-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#size_crust_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.crustSize.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#size_ingredients_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.ingredientsSize.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#size_product_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.productSize.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="size_crust_sizes">
            @includeIf('admin.variationsSizes.relationships.sizeCrustSizes', ['crustSizes' => $variationsSize->sizeCrustSizes])
        </div>
        <div class="tab-pane" role="tabpanel" id="size_ingredients_sizes">
            @includeIf('admin.variationsSizes.relationships.sizeIngredientsSizes', ['ingredientsSizes' => $variationsSize->sizeIngredientsSizes])
        </div>
        <div class="tab-pane" role="tabpanel" id="size_product_sizes">
            @includeIf('admin.variationsSizes.relationships.sizeProductSizes', ['productSizes' => $variationsSize->sizeProductSizes])
        </div>
    </div>
</div>

@endsection