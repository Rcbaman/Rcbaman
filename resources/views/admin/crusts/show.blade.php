@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crust.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crusts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crust.fields.id') }}
                        </th>
                        <td>
                            {{ $crust->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crust.fields.name') }}
                        </th>
                        <td>
                            {{ $crust->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crust.fields.slug') }}
                        </th>
                        <td>
                            {{ $crust->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crusts.index') }}">
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
            <a class="nav-link" href="#crust_crust_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.crustSize.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#crusts_products" role="tab" data-toggle="tab">
                {{ trans('cruds.product.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="crust_crust_sizes">
            @includeIf('admin.crusts.relationships.crustCrustSizes', ['crustSizes' => $crust->crustCrustSizes])
        </div>
        <div class="tab-pane" role="tabpanel" id="crusts_products">
            @includeIf('admin.crusts.relationships.crustsProducts', ['products' => $crust->crustsProducts])
        </div>
    </div>
</div>

@endsection