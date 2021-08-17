<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerManagementRequest;
use App\Http\Requests\UpdateCustomerManagementRequest;
use App\Http\Resources\Admin\CustomerManagementResource;
use App\Models\CustomerManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerManagementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerManagementResource(CustomerManagement::all());
    }

    public function store(StoreCustomerManagementRequest $request)
    {
        $customerManagement = CustomerManagement::create($request->all());

        return (new CustomerManagementResource($customerManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerManagement $customerManagement)
    {
        abort_if(Gate::denies('customer_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerManagementResource($customerManagement);
    }

    public function update(UpdateCustomerManagementRequest $request, CustomerManagement $customerManagement)
    {
        $customerManagement->update($request->all());

        return (new CustomerManagementResource($customerManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerManagement $customerManagement)
    {
        abort_if(Gate::denies('customer_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
