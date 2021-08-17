<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariationsSizeRequest;
use App\Http\Requests\UpdateVariationsSizeRequest;
use App\Http\Resources\Admin\VariationsSizeResource;
use App\Models\VariationsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VariationsSizeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('variations_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VariationsSizeResource(VariationsSize::all());
    }

    public function store(StoreVariationsSizeRequest $request)
    {
        $variationsSize = VariationsSize::create($request->all());

        return (new VariationsSizeResource($variationsSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VariationsSize $variationsSize)
    {
        abort_if(Gate::denies('variations_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VariationsSizeResource($variationsSize);
    }

    public function update(UpdateVariationsSizeRequest $request, VariationsSize $variationsSize)
    {
        $variationsSize->update($request->all());

        return (new VariationsSizeResource($variationsSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VariationsSize $variationsSize)
    {
        abort_if(Gate::denies('variations_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variationsSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
