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
            <a class="nav-link" href="#ingredients_dishes" role="tab" data-toggle="tab">
                {{ trans('cruds.dish.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ingredients_dishes">
            @includeIf('admin.ingredients.relationships.ingredientsDishes', ['dishes' => $ingredient->ingredientsDishes])
        </div>
    </div>
</div>

@endsection