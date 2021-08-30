@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productProfile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productProfile.fields.id') }}
                        </th>
                        <td>
                            {{ $productProfile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productProfile.fields.name') }}
                        </th>
                        <td>
                            {{ $productProfile->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productProfile.fields.slug') }}
                        </th>
                        <td>
                            {{ $productProfile->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#profile_products" role="tab" data-toggle="tab">
                {{ trans('cruds.product.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="profile_products">
            @includeIf('admin.productProfiles.relationships.profileProducts', ['products' => $productProfile->profileProducts])
        </div>
    </div>
</div>

@endsection