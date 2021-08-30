<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductProfileRequest;
use App\Http\Requests\UpdateProductProfileRequest;
use App\Http\Resources\Admin\ProductProfileResource;
use App\Models\ProductProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductProfileResource(ProductProfile::all());
    }

    public function store(StoreProductProfileRequest $request)
    {
        $productProfile = ProductProfile::create($request->all());

        return (new ProductProfileResource($productProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductProfile $productProfile)
    {
        abort_if(Gate::denies('product_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductProfileResource($productProfile);
    }

    public function update(UpdateProductProfileRequest $request, ProductProfile $productProfile)
    {
        $productProfile->update($request->all());

        return (new ProductProfileResource($productProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductProfile $productProfile)
    {
        abort_if(Gate::denies('product_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
