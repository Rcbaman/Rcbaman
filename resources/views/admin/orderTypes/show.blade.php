@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.orderType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.orderType.fields.id') }}
                        </th>
                        <td>
                            {{ $orderType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderType.fields.name') }}
                        </th>
                        <td>
                            {{ $orderType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.orderType.fields.slug') }}
                        </th>
                        <td>
                            {{ $orderType->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.order-types.index') }}">
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
            <a class="nav-link" href="#ordertype_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="ordertype_orders">
            @includeIf('admin.orderTypes.relationships.ordertypeOrders', ['orders' => $orderType->ordertypeOrders])
        </div>
    </div>
</div>

@endsection