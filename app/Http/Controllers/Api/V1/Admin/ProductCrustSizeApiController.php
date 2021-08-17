<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCrustSizeRequest;
use App\Http\Requests\UpdateProductCrustSizeRequest;
use App\Http\Resources\Admin\ProductCrustSizeResource;
use App\Models\ProductCrustSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCrustSizeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_crust_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductCrustSizeResource(ProductCrustSize::with(['product', 'crust', 'size'])->get());
    }

    public function store(StoreProductCrustSizeRequest $request)
    {
        $productCrustSize = ProductCrustSize::create($request->all());

        return (new ProductCrustSizeResource($productCrustSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductCrustSize $productCrustSize)
    {
        abort_if(Gate::denies('product_crust_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductCrustSizeResource($productCrustSize->load(['product', 'crust', 'size']));
    }

    public function update(UpdateProductCrustSizeRequest $request, ProductCrustSize $productCrustSize)
    {
        $productCrustSize->update($request->all());

        return (new ProductCrustSizeResource($productCrustSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductCrustSize $productCrustSize)
    {
        abort_if(Gate::denies('product_crust_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrustSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
