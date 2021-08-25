<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCrustRequest;
use App\Http\Requests\UpdateProductCrustRequest;
use App\Http\Resources\Admin\ProductCrustResource;
use App\Models\ProductCrust;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCrustsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_crust_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductCrustResource(ProductCrust::with(['product', 'crusts'])->get());
    }

    public function store(StoreProductCrustRequest $request)
    {
        $productCrust = ProductCrust::create($request->all());
        $productCrust->crusts()->sync($request->input('crusts', []));

        return (new ProductCrustResource($productCrust))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductCrust $productCrust)
    {
        abort_if(Gate::denies('product_crust_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductCrustResource($productCrust->load(['product', 'crusts']));
    }

    public function update(UpdateProductCrustRequest $request, ProductCrust $productCrust)
    {
        $productCrust->update($request->all());
        $productCrust->crusts()->sync($request->input('crusts', []));

        return (new ProductCrustResource($productCrust))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductCrust $productCrust)
    {
        abort_if(Gate::denies('product_crust_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCrust->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
