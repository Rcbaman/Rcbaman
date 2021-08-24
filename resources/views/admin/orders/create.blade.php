@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="total_amount">{{ trans('cruds.order.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}" step="0.01" required>
                @if($errors->has('total_amount'))
                    <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_id">{{ trans('cruds.order.fields.transaction') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id">
                    @foreach($transactions as $id => $entry)
                        <option value="{{ $id }}" {{ old('transaction_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction'))
                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customers">{{ trans('cruds.order.fields.customer') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('customers') ? 'is-invalid' : '' }}" name="customers[]" id="customers" multiple required>
                    @foreach($customers as $id => $customer)
                        <option value="{{ $id }}" {{ in_array($id, old('customers', [])) ? 'selected' : '' }}>{{ $customer }}</option>
                    @endforeach
                </select>
                @if($errors->has('customers'))
                    <span class="text-danger">{{ $errors->first('customers') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ordertakenbies">{{ trans('cruds.order.fields.ordertakenby') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ordertakenbies') ? 'is-invalid' : '' }}" name="ordertakenbies[]" id="ordertakenbies" multiple required>
                    @foreach($ordertakenbies as $id => $ordertakenby)
                        <option value="{{ $id }}" {{ in_array($id, old('ordertakenbies', [])) ? 'selected' : '' }}>{{ $ordertakenby }}</option>
                    @endforeach
                </select>
                @if($errors->has('ordertakenbies'))
                    <span class="text-danger">{{ $errors->first('ordertakenbies') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.ordertakenby_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.order_status') }}</label>
                <select class="form-control {{ $errors->has('order_status') ? 'is-invalid' : '' }}" name="order_status" id="order_status">
                    <option value disabled {{ old('order_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::ORDER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('order_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('order_status'))
                    <span class="text-danger">{{ $errors->first('order_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection