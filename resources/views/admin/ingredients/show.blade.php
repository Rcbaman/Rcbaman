@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ingredient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingredients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.id') }}
                        </th>
                        <td>
                            {{ $ingredient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.name') }}
                        </th>
                        <td>
                            {{ $ingredient->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingredient.fields.slug') }}
                        </th>
                        <td>
                            {{ $ingredient->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingredients.index') }}">
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
            <a class="nav-link" href="#ingredient_ingredients_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.ingredientsSize.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#ingredients_product_ingredients" role="tab" data-toggle="tab">
                {{ trans('cruds.productIngredient.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ingredient_ingredients_sizes">
            @includeIf('admin.ingredients.relationships.ingredientIngredientsSizes', ['ingredientsSizes' => $ingredient->ingredientIngredientsSizes])
        </div>
        <div class="tab-pane" role="tabpanel" id="ingredients_product_ingredients">
            @includeIf('admin.ingredients.relationships.ingredientsProductIngredients', ['productIngredients' => $ingredient->ingredientsProductIngredients])
        </div>
    </div>
</div>

@endsection