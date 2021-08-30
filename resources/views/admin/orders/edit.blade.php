@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="total_amount">{{ trans('cruds.order.fields.total_amount') }}</label>
                <input class="form-control {{ $errors->has('total_amount') ? 'is-invalid' : '' }}" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', $order->total_amount) }}" step="0.01" required>
                @if($errors->has('total_amount'))
                    <span class="text-danger">{{ $errors->first('total_amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.total_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transactions">{{ trans('cruds.order.fields.transaction') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('transactions') ? 'is-invalid' : '' }}" name="transactions[]" id="transactions" multiple required>
                    @foreach($transactions as $id => $transaction)
                        <option value="{{ $id }}" {{ (in_array($id, old('transactions', [])) || $order->transactions->contains($id)) ? 'selected' : '' }}>{{ $transaction }}</option>
                    @endforeach
                </select>
                @if($errors->has('transactions'))
                    <span class="text-danger">{{ $errors->first('transactions') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.order.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $order->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ordertakenby_id">{{ trans('cruds.order.fields.ordertakenby') }}</label>
                <select class="form-control select2 {{ $errors->has('ordertakenby') ? 'is-invalid' : '' }}" name="ordertakenby_id" id="ordertakenby_id">
                    @foreach($ordertakenbies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ordertakenby_id') ? old('ordertakenby_id') : $order->ordertakenby->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ordertakenby'))
                    <span class="text-danger">{{ $errors->first('ordertakenby') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.ordertakenby_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.order_status') }}</label>
                <select class="form-control {{ $errors->has('order_status') ? 'is-invalid' : '' }}" name="order_status" id="order_status">
                    <option value disabled {{ old('order_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Order::ORDER_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('order_status', $order->order_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('order_status'))
                    <span class="text-danger">{{ $errors->first('order_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ordertype_id">{{ trans('cruds.order.fields.ordertype') }}</label>
                <select class="form-control select2 {{ $errors->has('ordertype') ? 'is-invalid' : '' }}" name="ordertype_id" id="ordertype_id">
                    @foreach($ordertypes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ordertype_id') ? old('ordertype_id') : $order->ordertype->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ordertype'))
                    <span class="text-danger">{{ $errors->first('ordertype') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.ordertype_helper') }}</span>
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