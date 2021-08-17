<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishIngredientRequest;
use App\Http\Requests\UpdateDishIngredientRequest;
use App\Http\Resources\Admin\DishIngredientResource;
use App\Models\DishIngredient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DishIngredientsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dish_ingredient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DishIngredientResource(DishIngredient::all());
    }

    public function store(StoreDishIngredientRequest $request)
    {
        $dishIngredient = DishIngredient::create($request->all());

        return (new DishIngredientResource($dishIngredient))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DishIngredient $dishIngredient)
    {
        abort_if(Gate::denies('dish_ingredient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DishIngredientResource($dishIngredient);
    }

    public function update(UpdateDishIngredientRequest $request, DishIngredient $dishIngredient)
    {
        $dishIngredient->update($request->all());

        return (new DishIngredientResource($dishIngredient))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DishIngredient $dishIngredient)
    {
        abort_if(Gate::denies('dish_ingredient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dishIngredient->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
