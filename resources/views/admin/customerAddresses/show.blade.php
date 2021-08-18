@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.id') }}
                        </th>
                        <td>
                            {{ $customerAddress->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.customer') }}
                        </th>
                        <td>
                            {{ $customerAddress->customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.address') }}
                        </th>
                        <td>
                            {{ $customerAddress->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.address_2') }}
                        </th>
                        <td>
                            {{ $customerAddress->address_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.country') }}
                        </th>
                        <td>
                            {{ $customerAddress->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.state') }}
                        </th>
                        <td>
                            {{ $customerAddress->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.zip') }}
                        </th>
                        <td>
                            {{ $customerAddress->zip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection