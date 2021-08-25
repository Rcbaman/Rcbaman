@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crustSize.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crust-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crustSize.fields.id') }}
                        </th>
                        <td>
                            {{ $crustSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crustSize.fields.crust') }}
                        </th>
                        <td>
                            {{ $crustSize->crust->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crustSize.fields.size') }}
                        </th>
                        <td>
                            {{ $crustSize->size->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crustSize.fields.amount') }}
                        </th>
                        <td>
                            {{ $crustSize->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crust-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection