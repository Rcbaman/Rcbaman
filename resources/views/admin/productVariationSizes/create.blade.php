@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productVariationSize.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-variation-sizes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.productVariationSize.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productVariationSize.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="variationsize_id">{{ trans('cruds.productVariationSize.fields.variationsize') }}</label>
                <select class="form-control select2 {{ $errors->has('variationsize') ? 'is-invalid' : '' }}" name="variationsize_id" id="variationsize_id" required>
                    @foreach($variationsizes as $id => $entry)
                        <option value="{{ $id }}" {{ old('variationsize_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('variationsize'))
                    <span class="text-danger">{{ $errors->first('variationsize') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productVariationSize.fields.variationsize_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.productVariationSize.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productVariationSize.fields.amount_helper') }}</span>
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