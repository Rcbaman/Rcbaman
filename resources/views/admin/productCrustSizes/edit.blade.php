@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productCrustSize.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-crust-sizes.update", [$productCrustSize->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.productCrustSize.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $productCrustSize->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productCrustSize.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="crust_id">{{ trans('cruds.productCrustSize.fields.crust') }}</label>
                <select class="form-control select2 {{ $errors->has('crust') ? 'is-invalid' : '' }}" name="crust_id" id="crust_id" required>
                    @foreach($crusts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('crust_id') ? old('crust_id') : $productCrustSize->crust->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crust'))
                    <span class="text-danger">{{ $errors->first('crust') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productCrustSize.fields.crust_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="size_id">{{ trans('cruds.productCrustSize.fields.size') }}</label>
                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size_id" id="size_id" required>
                    @foreach($sizes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('size_id') ? old('size_id') : $productCrustSize->size->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('size'))
                    <span class="text-danger">{{ $errors->first('size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productCrustSize.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.productCrustSize.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $productCrustSize->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productCrustSize.fields.amount_helper') }}</span>
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