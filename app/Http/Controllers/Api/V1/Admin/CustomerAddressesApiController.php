<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Http\Resources\Admin\CustomerAddressResource;
use App\Models\CustomerAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAddressesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerAddressResource(CustomerAddress::with(['customer'])->get());
    }

    public function store(StoreCustomerAddressRequest $request)
    {
        $customerAddress = CustomerAddress::create($request->all());

        return (new CustomerAddressResource($customerAddress))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerAddressResource($customerAddress->load(['customer']));
    }

    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customerAddress)
    {
        $customerAddress->update($request->all());

        return (new CustomerAddressResource($customerAddress))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddress->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
