<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductCrustRequest;
use App\Http\Requests\StoreProductCrustRequest;
use App\Http\Requests\UpdateProductCrustRequest;
use App\Models\Crust;
use App\Models\Product;
use App\Models\ProductCrust;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCrustsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_crust_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrusts = ProductCrust::with(['product', 'crusts'])->get();

        $products = Product::get();

        $crusts = Crust::get();

        return view('admin.productCrusts.index', compact('productCrusts', 'products', 'crusts'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_crust_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crusts = Crust::pluck('name', 'id');

        return view('admin.productCrusts.create', compact('products', 'crusts'));
    }

    public function store(StoreProductCrustRequest $request)
    {
        $productCrust = ProductCrust::create($request->all());
        $productCrust->crusts()->sync($request->input('crusts', []));

        return redirect()->route('admin.product-crusts.index');
    }

    public function edit(ProductCrust $productCrust)
    {
        abort_if(Gate::denies('product_crust_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crusts = Crust::pluck('name', 'id');

        $productCrust->load('product', 'crusts');

        return view('admin.productCrusts.edit', compact('products', 'crusts', 'productCrust'));
    }

    public function update(UpdateProductCrustRequest $request, ProductCrust $productCrust)
    {
        $productCrust->update($request->all());
        $productCrust->crusts()->sync($request->input('crusts', []));

        return redirect()->route('admin.product-crusts.index');
    }

    public function show(ProductCrust $productCrust)
    {
        abort_if(Gate::denies('product_crust_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrust->load('product', 'crusts');

        return view('admin.productCrusts.show', compact('productCrust'));
    }

    public function destroy(ProductCrust $productCrust)
    {
        abort_if(Gate::denies('product_crust_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrust->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCrustRequest $request)
    {
        ProductCrust::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
