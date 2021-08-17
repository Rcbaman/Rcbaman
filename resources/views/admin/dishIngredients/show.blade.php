@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dishIngredient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dish-ingredients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dishIngredient.fields.id') }}
                        </th>
                        <td>
                            {{ $dishIngredient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dishIngredient.fields.name') }}
                        </th>
                        <td>
                            {{ $dishIngredient->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dishIngredient.fields.slug') }}
                        </th>
                        <td>
                            {{ $dishIngredient->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dish-ingredients.index') }}">
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
            <a class="nav-link" href="#ingredients_dishes" role="tab" data-toggle="tab">
                {{ trans('cruds.dish.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ingredients_dishes">
            @includeIf('admin.dishIngredients.relationships.ingredientsDishes', ['dishes' => $dishIngredient->ingredientsDishes])
        </div>
    </div>
</div>

@endsection