<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerDetailRequest;
use App\Http\Requests\UpdateCustomerDetailRequest;
use App\Http\Resources\Admin\CustomerDetailResource;
use App\Models\CustomerDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerDetailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerDetailResource(CustomerDetail::all());
    }

    public function store(StoreCustomerDetailRequest $request)
    {
        $customerDetail = CustomerDetail::create($request->all());

        return (new CustomerDetailResource($customerDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerDetail $customerDetail)
    {
        abort_if(Gate::denies('customer_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerDetailResource($customerDetail);
    }

    public function update(UpdateCustomerDetailRequest $request, CustomerDetail $customerDetail)
    {
        $customerDetail->update($request->all());

        return (new CustomerDetailResource($customerDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerDetail $customerDetail)
    {
        abort_if(Gate::denies('customer_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
