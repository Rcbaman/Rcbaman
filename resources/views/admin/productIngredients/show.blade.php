@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productIngredient.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-ingredients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productIngredient.fields.id') }}
                        </th>
                        <td>
                            {{ $productIngredient->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productIngredient.fields.product') }}
                        </th>
                        <td>
                            {{ $productIngredient->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productIngredient.fields.ingredients') }}
                        </th>
                        <td>
                            @foreach($productIngredient->ingredients as $key => $ingredients)
                                <span class="label label-info">{{ $ingredients->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-ingredients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection