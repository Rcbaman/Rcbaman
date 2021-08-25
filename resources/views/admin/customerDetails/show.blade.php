@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $customerDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.first_name') }}
                        </th>
                        <td>
                            {{ $customerDetail->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.last_name') }}
                        </th>
                        <td>
                            {{ $customerDetail->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.email') }}
                        </th>
                        <td>
                            {{ $customerDetail->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.mobile_number') }}
                        </th>
                        <td>
                            {{ $customerDetail->mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.dob') }}
                        </th>
                        <td>
                            {{ $customerDetail->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerDetail.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerDetail::GENDER_SELECT[$customerDetail->gender] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-details.index') }}">
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
            <a class="nav-link" href="#customer_customer_addresses" role="tab" data-toggle="tab">
                {{ trans('cruds.customerAddress.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#customer_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.order.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="customer_customer_addresses">
            @includeIf('admin.customerDetails.relationships.customerCustomerAddresses', ['customerAddresses' => $customerDetail->customerCustomerAddresses])
        </div>
        <div class="tab-pane" role="tabpanel" id="customer_orders">
            @includeIf('admin.customerDetails.relationships.customerOrders', ['orders' => $customerDetail->customerOrders])
        </div>
    </div>
</div>

@endsection