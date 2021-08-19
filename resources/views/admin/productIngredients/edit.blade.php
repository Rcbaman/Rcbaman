@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.productIngredient.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-ingredients.update", [$productIngredient->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.productIngredient.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $productIngredient->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productIngredient.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ingredients">{{ trans('cruds.productIngredient.fields.ingredients') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('ingredients') ? 'is-invalid' : '' }}" name="ingredients[]" id="ingredients" multiple>
                    @foreach($ingredients as $id => $ingredient)
                        <option value="{{ $id }}" {{ (in_array($id, old('ingredients', [])) || $productIngredient->ingredients->contains($id)) ? 'selected' : '' }}>{{ $ingredient }}</option>
                    @endforeach
                </select>
                @if($errors->has('ingredients'))
                    <span class="text-danger">{{ $errors->first('ingredients') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.productIngredient.fields.ingredients_helper') }}</span>
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