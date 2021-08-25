@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.log.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.logs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.log.fields.id') }}
                        </th>
                        <td>
                            {{ $log->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.log.fields.user') }}
                        </th>
                        <td>
                            {{ $log->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.log.fields.uuid') }}
                        </th>
                        <td>
                            {{ $log->uuid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.log.fields.device_ip') }}
                        </th>
                        <td>
                            {{ $log->device_ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.log.fields.device_type') }}
                        </th>
                        <td>
                            {{ $log->device_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.log.fields.action') }}
                        </th>
                        <td>
                            {{ $log->action }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.logs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection