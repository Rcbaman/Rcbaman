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
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection