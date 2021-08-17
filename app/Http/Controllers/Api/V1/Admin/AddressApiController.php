<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\Admin\AddressResource;
use App\Models\Address;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddressResource(Address::with(['customers'])->get());
    }

    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->all());
        $address->customers()->sync($request->input('customers', []));

        return (new AddressResource($address))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Address $address)
    {
        abort_if(Gate::denies('address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddressResource($address->load(['customers']));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());
        $address->customers()->sync($request->input('customers', []));

        return (new AddressResource($address))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Address $address)
    {
        abort_if(Gate::denies('address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
