@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.transaction.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Transaction::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'initialize') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="method">{{ trans('cruds.transaction.fields.method') }}</label>
                <input class="form-control {{ $errors->has('method') ? 'is-invalid' : '' }}" type="text" name="method" id="method" value="{{ old('method', '') }}" required>
                @if($errors->has('method'))
                    <span class="text-danger">{{ $errors->first('method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_total">{{ trans('cruds.transaction.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', '') }}" step="0.01">
                @if($errors->has('sub_total'))
                    <span class="text-danger">{{ $errors->first('sub_total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.sub_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.transaction.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="number" name="tax" id="tax" value="{{ old('tax', '') }}" step="0.01">
                @if($errors->has('tax'))
                    <span class="text-danger">{{ $errors->first('tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_charges">{{ trans('cruds.transaction.fields.other_charges') }}</label>
                <input class="form-control {{ $errors->has('other_charges') ? 'is-invalid' : '' }}" type="number" name="other_charges" id="other_charges" value="{{ old('other_charges', '') }}" step="0.01">
                @if($errors->has('other_charges'))
                    <span class="text-danger">{{ $errors->first('other_charges') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.other_charges_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.transaction.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.amount_helper') }}</span>
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