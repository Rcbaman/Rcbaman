<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Http\Resources\Admin\ProductSizeResource;
use App\Models\ProductSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductSizesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductSizeResource(ProductSize::with(['product', 'size'])->get());
    }

    public function store(StoreProductSizeRequest $request)
    {
        $productSize = ProductSize::create($request->all());

        return (new ProductSizeResource($productSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductSizeResource($productSize->load(['product', 'size']));
    }

    public function update(UpdateProductSizeRequest $request, ProductSize $productSize)
    {
        $productSize->update($request->all());

        return (new ProductSizeResource($productSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductSize $productSize)
    {
        abort_if(Gate::denies('product_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
