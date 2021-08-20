@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.log.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.logs.update", [$log->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.log.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $log->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.log.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="uuid">{{ trans('cruds.log.fields.uuid') }}</label>
                <input class="form-control {{ $errors->has('uuid') ? 'is-invalid' : '' }}" type="text" name="uuid" id="uuid" value="{{ old('uuid', $log->uuid) }}" required>
                @if($errors->has('uuid'))
                    <span class="text-danger">{{ $errors->first('uuid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.log.fields.uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="device_ip">{{ trans('cruds.log.fields.device_ip') }}</label>
                <input class="form-control {{ $errors->has('device_ip') ? 'is-invalid' : '' }}" type="text" name="device_ip" id="device_ip" value="{{ old('device_ip', $log->device_ip) }}" required>
                @if($errors->has('device_ip'))
                    <span class="text-danger">{{ $errors->first('device_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.log.fields.device_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="device_type">{{ trans('cruds.log.fields.device_type') }}</label>
                <input class="form-control {{ $errors->has('device_type') ? 'is-invalid' : '' }}" type="text" name="device_type" id="device_type" value="{{ old('device_type', $log->device_type) }}">
                @if($errors->has('device_type'))
                    <span class="text-danger">{{ $errors->first('device_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.log.fields.device_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="action">{{ trans('cruds.log.fields.action') }}</label>
                <input class="form-control {{ $errors->has('action') ? 'is-invalid' : '' }}" type="text" name="action" id="action" value="{{ old('action', $log->action) }}" required>
                @if($errors->has('action'))
                    <span class="text-danger">{{ $errors->first('action') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.log.fields.action_helper') }}</span>
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