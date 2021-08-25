<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIngredientsSizeRequest;
use App\Http\Requests\StoreIngredientsSizeRequest;
use App\Http\Requests\UpdateIngredientsSizeRequest;
use App\Models\Ingredient;
use App\Models\IngredientsSize;
use App\Models\VariationsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IngredientsSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ingredients_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredientsSizes = IngredientsSize::with(['ingredient', 'size'])->get();

        $ingredients = Ingredient::get();

        $variations_sizes = VariationsSize::get();

        return view('admin.ingredientsSizes.index', compact('ingredientsSizes', 'ingredients', 'variations_sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('ingredients_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredients = Ingredient::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ingredientsSizes.create', compact('ingredients', 'sizes'));
    }

    public function store(StoreIngredientsSizeRequest $request)
    {
        $ingredientsSize = IngredientsSize::create($request->all());

        return redirect()->route('admin.ingredients-sizes.index');
    }

    public function edit(IngredientsSize $ingredientsSize)
    {
        abort_if(Gate::denies('ingredients_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredients = Ingredient::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingredientsSize->load('ingredient', 'size');

        return view('admin.ingredientsSizes.edit', compact('ingredients', 'sizes', 'ingredientsSize'));
    }

    public function update(UpdateIngredientsSizeRequest $request, IngredientsSize $ingredientsSize)
    {
        $ingredientsSize->update($request->all());

        return redirect()->route('admin.ingredients-sizes.index');
    }

    public function show(IngredientsSize $ingredientsSize)
    {
        abort_if(Gate::denies('ingredients_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredientsSize->load('ingredient', 'size');

        return view('admin.ingredientsSizes.show', compact('ingredientsSize'));
    }

    public function destroy(IngredientsSize $ingredientsSize)
    {
        abort_if(Gate::denies('ingredients_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredientsSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyIngredientsSizeRequest $request)
    {
        IngredientsSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
