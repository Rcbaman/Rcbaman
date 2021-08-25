@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.crustSize.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crust-sizes.update", [$crustSize->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="crust_id">{{ trans('cruds.crustSize.fields.crust') }}</label>
                <select class="form-control select2 {{ $errors->has('crust') ? 'is-invalid' : '' }}" name="crust_id" id="crust_id" required>
                    @foreach($crusts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('crust_id') ? old('crust_id') : $crustSize->crust->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('crust'))
                    <span class="text-danger">{{ $errors->first('crust') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crustSize.fields.crust_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="size_id">{{ trans('cruds.crustSize.fields.size') }}</label>
                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size_id" id="size_id">
                    @foreach($sizes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('size_id') ? old('size_id') : $crustSize->size->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('size'))
                    <span class="text-danger">{{ $errors->first('size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crustSize.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.crustSize.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $crustSize->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crustSize.fields.amount_helper') }}</span>
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