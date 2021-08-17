<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCrustRequest;
use App\Http\Requests\UpdateCrustRequest;
use App\Http\Resources\Admin\CrustResource;
use App\Models\Crust;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrustsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crust_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrustResource(Crust::all());
    }

    public function store(StoreCrustRequest $request)
    {
        $crust = Crust::create($request->all());

        return (new CrustResource($crust))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Crust $crust)
    {
        abort_if(Gate::denies('crust_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrustResource($crust);
    }

    public function update(UpdateCrustRequest $request, Crust $crust)
    {
        $crust->update($request->all());

        return (new CrustResource($crust))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Crust $crust)
    {
        abort_if(Gate::denies('crust_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crust->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
