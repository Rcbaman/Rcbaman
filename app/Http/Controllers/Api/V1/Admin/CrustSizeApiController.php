<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCrustSizeRequest;
use App\Http\Requests\UpdateCrustSizeRequest;
use App\Http\Resources\Admin\CrustSizeResource;
use App\Models\CrustSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrustSizeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crust_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrustSizeResource(CrustSize::with(['crust', 'size'])->get());
    }

    public function store(StoreCrustSizeRequest $request)
    {
        $crustSize = CrustSize::create($request->all());

        return (new CrustSizeResource($crustSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CrustSize $crustSize)
    {
        abort_if(Gate::denies('crust_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrustSizeResource($crustSize->load(['crust', 'size']));
    }

    public function update(UpdateCrustSizeRequest $request, CrustSize $crustSize)
    {
        $crustSize->update($request->all());

        return (new CrustSizeResource($crustSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CrustSize $crustSize)
    {
        abort_if(Gate::denies('crust_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crustSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
