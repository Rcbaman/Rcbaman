@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $customerManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.mobile_number') }}
                        </th>
                        <td>
                            {{ $customerManagement->mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.first_name') }}
                        </th>
                        <td>
                            {{ $customerManagement->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.last_name') }}
                        </th>
                        <td>
                            {{ $customerManagement->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.email') }}
                        </th>
                        <td>
                            {{ $customerManagement->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.dob') }}
                        </th>
                        <td>
                            {{ $customerManagement->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerManagement.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerManagement::GENDER_SELECT[$customerManagement->gender] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-managements.index') }}">
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
            <a class="nav-link" href="#customer_addresses" role="tab" data-toggle="tab">
                {{ trans('cruds.address.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="customer_addresses">
            @includeIf('admin.customerManagements.relationships.customerAddresses', ['addresses' => $customerManagement->customerAddresses])
        </div>
    </div>
</div>

@endsection