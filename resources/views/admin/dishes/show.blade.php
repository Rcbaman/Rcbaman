@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dish.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dishes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dish.fields.id') }}
                        </th>
                        <td>
                            {{ $dish->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dish.fields.product') }}
                        </th>
                        <td>
                            {{ $dish->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dish.fields.ingredients') }}
                        </th>
                        <td>
                            @foreach($dish->ingredients as $key => $ingredients)
                                <span class="label label-info">{{ $ingredients->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dish.fields.crusts') }}
                        </th>
                        <td>
                            {{ $dish->crusts->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dish.fields.category') }}
                        </th>
                        <td>
                            {{ $dish->category->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dishes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection