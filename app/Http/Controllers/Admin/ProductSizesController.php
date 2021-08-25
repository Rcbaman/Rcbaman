<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductSizeRequest;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\VariationsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSizesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSizes = ProductSize::with(['product', 'size'])->get();

        $products = Product::get();

        $variations_sizes = VariationsSize::get();

        return view('admin.productSizes.index', compact('productSizes', 'products', 'variations_sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productSizes.create', compact('products', 'sizes'));
    }

    public function store(StoreProductSizeRequest $request)
    {
        $productSize = ProductSize::create($request->all());

        return redirect()->route('admin.product-sizes.index');
    }

    public function edit(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productSize->load('product', 'size');

        return view('admin.productSizes.edit', compact('products', 'sizes', 'productSize'));
    }

    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        $productSize->update($request->all());

        return redirect()->route('admin.product-sizes.index');
    }

    public function show(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSize->load('product', 'size');

        return view('admin.productSizes.show', compact('productSize'));
    }

    public function destroy(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductSizeRequest $request)
    {
        ProductSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
