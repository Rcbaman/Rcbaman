<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductCategoryRequest;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategories = ProductCategory::with(['product', 'categories'])->get();

        $products = Product::get();

        $categories = Category::get();

        return view('admin.productCategories.index', compact('productCategories', 'products', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id');

        return view('admin.productCategories.create', compact('products', 'categories'));
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $productCategory = ProductCategory::create($request->all());
        $productCategory->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.product-categories.index');
    }

    public function edit(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id');

        $productCategory->load('product', 'categories');

        return view('admin.productCategories.edit', compact('products', 'categories', 'productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());
        $productCategory->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.product-categories.index');
    }

    public function show(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategory->load('product', 'categories');

        return view('admin.productCategories.show', compact('productCategory'));
    }

    public function destroy(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCategoryRequest $request)
    {
        ProductCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
