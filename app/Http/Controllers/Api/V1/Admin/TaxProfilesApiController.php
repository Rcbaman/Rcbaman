<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxProfileRequest;
use App\Http\Requests\UpdateTaxProfileRequest;
use App\Http\Resources\Admin\TaxProfileResource;
use App\Models\TaxProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxProfilesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxProfileResource(TaxProfile::all());
    }

    public function store(StoreTaxProfileRequest $request)
    {
        $taxProfile = TaxProfile::create($request->all());

        return (new TaxProfileResource($taxProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TaxProfile $taxProfile)
    {
        abort_if(Gate::denies('tax_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaxProfileResource($taxProfile);
    }

    public function update(UpdateTaxProfileRequest $request, TaxProfile $taxProfile)
    {
        $taxProfile->update($request->all());

        return (new TaxProfileResource($taxProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TaxProfile $taxProfile)
    {
        abort_if(Gate::denies('tax_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
