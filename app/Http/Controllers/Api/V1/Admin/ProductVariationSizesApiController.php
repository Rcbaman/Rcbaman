<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductVariationSizeRequest;
use App\Http\Requests\UpdateProductVariationSizeRequest;
use App\Http\Resources\Admin\ProductVariationSizeResource;
use App\Models\ProductVariationSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductVariationSizesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_variation_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductVariationSizeResource(ProductVariationSize::with(['product', 'variationsize'])->get());
    }

    public function store(StoreProductVariationSizeRequest $request)
    {
        $productVariationSize = ProductVariationSize::create($request->all());

        return (new ProductVariationSizeResource($productVariationSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductVariationSize $productVariationSize)
    {
        abort_if(Gate::denies('product_variation_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductVariationSizeResource($productVariationSize->load(['product', 'variationsize']));
    }

    public function update(UpdateProductVariationSizeRequest $request, ProductVariationSize $productVariationSize)
    {
        $productVariationSize->update($request->all());

        return (new ProductVariationSizeResource($productVariationSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductVariationSize $productVariationSize)
    {
        abort_if(Gate::denies('product_variation_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productVariationSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
