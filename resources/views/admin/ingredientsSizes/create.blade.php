@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ingredientsSize.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ingredients-sizes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ingredient_id">{{ trans('cruds.ingredientsSize.fields.ingredient') }}</label>
                <select class="form-control select2 {{ $errors->has('ingredient') ? 'is-invalid' : '' }}" name="ingredient_id" id="ingredient_id">
                    @foreach($ingredients as $id => $entry)
                        <option value="{{ $id }}" {{ old('ingredient_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ingredient'))
                    <span class="text-danger">{{ $errors->first('ingredient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredientsSize.fields.ingredient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="size_id">{{ trans('cruds.ingredientsSize.fields.size') }}</label>
                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size_id" id="size_id">
                    @foreach($sizes as $id => $entry)
                        <option value="{{ $id }}" {{ old('size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('size'))
                    <span class="text-danger">{{ $errors->first('size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredientsSize.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.ingredientsSize.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingredientsSize.fields.amount_helper') }}</span>
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