<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDishRequest;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Category;
use App\Models\Crust;
use App\Models\Dish;
use App\Models\DishIngredient;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DishesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dish_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dishes = Dish::with(['product', 'ingredients', 'crusts', 'category'])->get();

        $products = Product::get();

        $dish_ingredients = DishIngredient::get();

        $crusts = Crust::get();

        $categories = Category::get();

        return view('admin.dishes.index', compact('dishes', 'products', 'dish_ingredients', 'crusts', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('dish_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingredients = DishIngredient::pluck('name', 'id');

        $crusts = Crust::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dishes.create', compact('products', 'ingredients', 'crusts', 'categories'));
    }

    public function store(StoreDishRequest $request)
    {
        $dish = Dish::create($request->all());
        $dish->ingredients()->sync($request->input('ingredients', []));

        return redirect()->route('admin.dishes.index');
    }

    public function edit(Dish $dish)
    {
        abort_if(Gate::denies('dish_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingredients = DishIngredient::pluck('name', 'id');

        $crusts = Crust::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dish->load('product', 'ingredients', 'crusts', 'category');

        return view('admin.dishes.edit', compact('products', 'ingredients', 'crusts', 'categories', 'dish'));
    }

    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $dish->update($request->all());
        $dish->ingredients()->sync($request->input('ingredients', []));

        return redirect()->route('admin.dishes.index');
    }

    public function show(Dish $dish)
    {
        abort_if(Gate::denies('dish_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dish->load('product', 'ingredients', 'crusts', 'category');

        return view('admin.dishes.show', compact('dish'));
    }

    public function destroy(Dish $dish)
    {
        abort_if(Gate::denies('dish_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dish->delete();

        return back();
    }

    public function massDestroy(MassDestroyDishRequest $request)
    {
        Dish::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
