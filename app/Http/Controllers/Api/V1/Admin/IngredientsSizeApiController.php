<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientsSizeRequest;
use App\Http\Requests\UpdateIngredientsSizeRequest;
use App\Http\Resources\Admin\IngredientsSizeResource;
use App\Models\IngredientsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IngredientsSizeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ingredients_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IngredientsSizeResource(IngredientsSize::with(['ingredient', 'size'])->get());
    }

    public function store(StoreIngredientsSizeRequest $request)
    {
        $ingredientsSize = IngredientsSize::create($request->all());

        return (new IngredientsSizeResource($ingredientsSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(IngredientsSize $ingredientsSize)
    {
        abort_if(Gate::denies('ingredients_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IngredientsSizeResource($ingredientsSize->load(['ingredient', 'size']));
    }

    public function update(UpdateIngredientsSizeRequest $request, IngredientsSize $ingredientsSize)
    {
        $ingredientsSize->update($request->all());

        return (new IngredientsSizeResource($ingredientsSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(IngredientsSize $ingredientsSize)
    {
        abort_if(Gate::denies('ingredients_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingredientsSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
