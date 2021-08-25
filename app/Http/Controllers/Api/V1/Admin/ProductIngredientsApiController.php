<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductIngredientRequest;
use App\Http\Requests\UpdateProductIngredientRequest;
use App\Http\Resources\Admin\ProductIngredientResource;
use App\Models\ProductIngredient;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductIngredientsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_ingredient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductIngredientResource(ProductIngredient::with(['product', 'ingredients'])->get());
    }

    public function store(StoreProductIngredientRequest $request)
    {
        $productIngredient = ProductIngredient::create($request->all());
        $productIngredient->ingredients()->sync($request->input('ingredients', []));

        return (new ProductIngredientResource($productIngredient))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductIngredient $productIngredient)
    {
        abort_if(Gate::denies('product_ingredient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductIngredientResource($productIngredient->load(['product', 'ingredients']));
    }

    public function update(UpdateProductIngredientRequest $request, ProductIngredient $productIngredient)
    {
        $productIngredient->update($request->all());
        $productIngredient->ingredients()->sync($request->input('ingredients', []));

        return (new ProductIngredientResource($productIngredient))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductIngredient $productIngredient)
    {
        abort_if(Gate::denies('product_ingredient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productIngredient->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
