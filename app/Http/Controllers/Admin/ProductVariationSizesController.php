<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductVariationSizeRequest;
use App\Http\Requests\StoreProductVariationSizeRequest;
use App\Http\Requests\UpdateProductVariationSizeRequest;
use App\Models\Product;
use App\Models\ProductVariationSize;
use App\Models\VariationsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductVariationSizesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_variation_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productVariationSizes = ProductVariationSize::with(['product', 'variationsize'])->get();

        $products = Product::get();

        $variations_sizes = VariationsSize::get();

        return view('admin.productVariationSizes.index', compact('productVariationSizes', 'products', 'variations_sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_variation_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $variationsizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productVariationSizes.create', compact('products', 'variationsizes'));
    }

    public function store(StoreProductVariationSizeRequest $request)
    {
        $productVariationSize = ProductVariationSize::create($request->all());

        return redirect()->route('admin.product-variation-sizes.index');
    }

    public function edit(ProductVariationSize $productVariationSize)
    {
        abort_if(Gate::denies('product_variation_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $variationsizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productVariationSize->load('product', 'variationsize');

        return view('admin.productVariationSizes.edit', compact('products', 'variationsizes', 'productVariationSize'));
    }

    public function update(UpdateProductVariationSizeRequest $request, ProductVariationSize $productVariationSize)
    {
        $productVariationSize->update($request->all());

        return redirect()->route('admin.product-variation-sizes.index');
    }

    public function show(ProductVariationSize $productVariationSize)
    {
        abort_if(Gate::denies('product_variation_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productVariationSize->load('product', 'variationsize', 'sizeProductCrustSizes');

        return view('admin.productVariationSizes.show', compact('productVariationSize'));
    }

    public function destroy(ProductVariationSize $productVariationSize)
    {
        abort_if(Gate::denies('product_variation_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productVariationSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductVariationSizeRequest $request)
    {
        ProductVariationSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
