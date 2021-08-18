@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                        </th>
                        <td>
                            {{ $product->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.regular_price') }}
                        </th>
                        <td>
                            {{ $product->regular_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.sale_price') }}
                        </th>
                        <td>
                            {{ $product->sale_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.variations') }}
                        </th>
                        <td>
                            {{ App\Models\Product::VARIATIONS_SELECT[$product->variations] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.image') }}
                        </th>
                        <td>
                            @if($product->image)
                                <a href="{{ $product->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $product->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.multi_images') }}
                        </th>
                        <td>
                            @foreach($product->multi_images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Product::STATUS_SELECT[$product->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.slug') }}
                        </th>
                        <td>
                            {{ $product->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
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
            <a class="nav-link" href="#product_product_variation_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.productVariationSize.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#product_product_crust_sizes" role="tab" data-toggle="tab">
                {{ trans('cruds.productCrustSize.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#product_dishes" role="tab" data-toggle="tab">
                {{ trans('cruds.dish.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="product_product_variation_sizes">
            @includeIf('admin.products.relationships.productProductVariationSizes', ['productVariationSizes' => $product->productProductVariationSizes])
        </div>
        <div class="tab-pane" role="tabpanel" id="product_product_crust_sizes">
            @includeIf('admin.products.relationships.productProductCrustSizes', ['productCrustSizes' => $product->productProductCrustSizes])
        </div>
        <div class="tab-pane" role="tabpanel" id="product_dishes">
            @includeIf('admin.products.relationships.productDishes', ['dishes' => $product->productDishes])
        </div>
    </div>
</div>

@endsection