<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDishIngredientRequest;
use App\Http\Requests\StoreDishIngredientRequest;
use App\Http\Requests\UpdateDishIngredientRequest;
use App\Models\DishIngredient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DishIngredientsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dish_ingredient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dishIngredients = DishIngredient::all();

        return view('admin.dishIngredients.index', compact('dishIngredients'));
    }

    public function create()
    {
        abort_if(Gate::denies('dish_ingredient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dishIngredients.create');
    }

    public function store(StoreDishIngredientRequest $request)
    {
        $dishIngredient = DishIngredient::create($request->all());

        return redirect()->route('admin.dish-ingredients.index');
    }

    public function edit(DishIngredient $dishIngredient)
    {
        abort_if(Gate::denies('dish_ingredient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dishIngredients.edit', compact('dishIngredient'));
    }

    public function update(UpdateDishIngredientRequest $request, DishIngredient $dishIngredient)
    {
        $dishIngredient->update($request->all());

        return redirect()->route('admin.dish-ingredients.index');
    }

    public function show(DishIngredient $dishIngredient)
    {
        abort_if(Gate::denies('dish_ingredient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dishIngredient->load('ingredientsDishes');

        return view('admin.dishIngredients.show', compact('dishIngredient'));
    }

    public function destroy(DishIngredient $dishIngredient)
    {
        abort_if(Gate::denies('dish_ingredient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dishIngredient->delete();

        return back();
    }

    public function massDestroy(MassDestroyDishIngredientRequest $request)
    {
        DishIngredient::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
