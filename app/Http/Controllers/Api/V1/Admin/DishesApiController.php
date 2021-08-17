<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Resources\Admin\DishResource;
use App\Models\Dish;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DishesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dish_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DishResource(Dish::with(['product', 'ingredients', 'crusts'])->get());
    }

    public function store(StoreDishRequest $request)
    {
        $dish = Dish::create($request->all());
        $dish->ingredients()->sync($request->input('ingredients', []));

        return (new DishResource($dish))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Dish $dish)
    {
        abort_if(Gate::denies('dish_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DishResource($dish->load(['product', 'ingredients', 'crusts']));
    }

    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $dish->update($request->all());
        $dish->ingredients()->sync($request->input('ingredients', []));

        return (new DishResource($dish))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Dish $dish)
    {
        abort_if(Gate::denies('dish_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dish->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
