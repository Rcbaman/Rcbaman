<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductIngredientRequest;
use App\Http\Requests\StoreProductIngredientRequest;
use App\Http\Requests\UpdateProductIngredientRequest;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\ProductIngredient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductIngredientsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_ingredient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productIngredients = ProductIngredient::with(['product', 'ingredients'])->get();

        $products = Product::get();

        $ingredients = Ingredient::get();

        return view('admin.productIngredients.index', compact('productIngredients', 'products', 'ingredients'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_ingredient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingredients = Ingredient::pluck('name', 'id');

        return view('admin.productIngredients.create', compact('products', 'ingredients'));
    }

    public function store(StoreProductIngredientRequest $request)
    {
        $productIngredient = ProductIngredient::create($request->all());
        $productIngredient->ingredients()->sync($request->input('ingredients', []));

        return redirect()->route('admin.product-ingredients.index');
    }

    public function edit(ProductIngredient $productIngredient)
    {
        abort_if(Gate::denies('product_ingredient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingredients = Ingredient::pluck('name', 'id');

        $productIngredient->load('product', 'ingredients');

        return view('admin.productIngredients.edit', compact('products', 'ingredients', 'productIngredient'));
    }

    public function update(UpdateProductIngredientRequest $request, ProductIngredient $productIngredient)
    {
        $productIngredient->update($request->all());
        $productIngredient->ingredients()->sync($request->input('ingredients', []));

        return redirect()->route('admin.product-ingredients.index');
    }

    public function show(ProductIngredient $productIngredient)
    {
        abort_if(Gate::denies('product_ingredient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productIngredient->load('product', 'ingredients');

        return view('admin.productIngredients.show', compact('productIngredient'));
    }

    public function destroy(ProductIngredient $productIngredient)
    {
        abort_if(Gate::denies('product_ingredient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productIngredient->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductIngredientRequest $request)
    {
        ProductIngredient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
