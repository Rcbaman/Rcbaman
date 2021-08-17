@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productVariationSize.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-variation-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariationSize.fields.id') }}
                        </th>
                        <td>
                            {{ $productVariationSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariationSize.fields.product') }}
                        </th>
                        <td>
                            {{ $productVariationSize->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariationSize.fields.variationsize') }}
                        </th>
                        <td>
                            {{ $productVariationSize->variationsize->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productVariationSize.fields.amount') }}
                        </th>
                        <td>
                            {{ $productVariationSize->amount }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-variation-sizes.index') }}">
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
            <a class="nav-link" href="#size_product_crust_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.productCrustSize.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="size_product_crust_sizes">
            @includeIf('admin.productVariationSizes.relationships.sizeProductCrustSizes', ['productCrustSizes' => $productVariationSize->sizeProductCrustSizes])
        </div>
    </div>
</div>

@endsection