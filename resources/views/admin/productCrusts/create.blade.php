@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productCrust.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-crusts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.productCrust.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productCrust.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crusts">{{ trans('cruds.productCrust.fields.crust') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('crusts') ? 'is-invalid' : '' }}" name="crusts[]" id="crusts" multiple>
                    @foreach($crusts as $id => $crust)
                        <option value="{{ $id }}" {{ in_array($id, old('crusts', [])) ? 'selected' : '' }}>{{ $crust }}</option>
                    @endforeach
                </select>
                @if($errors->has('crusts'))
                    <span class="text-danger">{{ $errors->first('crusts') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productCrust.fields.crust_helper') }}</span>
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