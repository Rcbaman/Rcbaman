<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductCrustSizeRequest;
use App\Http\Requests\StoreProductCrustSizeRequest;
use App\Http\Requests\UpdateProductCrustSizeRequest;
use App\Models\Crust;
use App\Models\Product;
use App\Models\ProductCrustSize;
use App\Models\ProductVariationSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCrustSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_crust_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrustSizes = ProductCrustSize::with(['product', 'crust', 'size'])->get();

        $products = Product::get();

        $crusts = Crust::get();

        $product_variation_sizes = ProductVariationSize::get();

        return view('admin.productCrustSizes.index', compact('productCrustSizes', 'products', 'crusts', 'product_variation_sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_crust_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crusts = Crust::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = ProductVariationSize::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productCrustSizes.create', compact('products', 'crusts', 'sizes'));
    }

    public function store(StoreProductCrustSizeRequest $request)
    {
        $productCrustSize = ProductCrustSize::create($request->all());

        return redirect()->route('admin.product-crust-sizes.index');
    }

    public function edit(ProductCrustSize $productCrustSize)
    {
        abort_if(Gate::denies('product_crust_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crusts = Crust::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = ProductVariationSize::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productCrustSize->load('product', 'crust', 'size');

        return view('admin.productCrustSizes.edit', compact('products', 'crusts', 'sizes', 'productCrustSize'));
    }

    public function update(UpdateProductCrustSizeRequest $request, ProductCrustSize $productCrustSize)
    {
        $productCrustSize->update($request->all());

        return redirect()->route('admin.product-crust-sizes.index');
    }

    public function show(ProductCrustSize $productCrustSize)
    {
        abort_if(Gate::denies('product_crust_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrustSize->load('product', 'crust', 'size');

        return view('admin.productCrustSizes.show', compact('productCrustSize'));
    }

    public function destroy(ProductCrustSize $productCrustSize)
    {
        abort_if(Gate::denies('product_crust_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrustSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCrustSizeRequest $request)
    {
        ProductCrustSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
