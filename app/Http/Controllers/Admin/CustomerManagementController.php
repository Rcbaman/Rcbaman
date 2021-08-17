<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerManagementRequest;
use App\Http\Requests\StoreCustomerManagementRequest;
use App\Http\Requests\UpdateCustomerManagementRequest;
use App\Models\CustomerManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerManagements = CustomerManagement::all();

        return view('admin.customerManagements.index', compact('customerManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerManagements.create');
    }

    public function store(StoreCustomerManagementRequest $request)
    {
        $customerManagement = CustomerManagement::create($request->all());

        return redirect()->route('admin.customer-managements.index');
    }

    public function edit(CustomerManagement $customerManagement)
    {
        abort_if(Gate::denies('customer_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerManagements.edit', compact('customerManagement'));
    }

    public function update(UpdateCustomerManagementRequest $request, CustomerManagement $customerManagement)
    {
        $customerManagement->update($request->all());

        return redirect()->route('admin.customer-managements.index');
    }

    public function show(CustomerManagement $customerManagement)
    {
        abort_if(Gate::denies('customer_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerManagement->load('customerAddresses');

        return view('admin.customerManagements.show', compact('customerManagement'));
    }

    public function destroy(CustomerManagement $customerManagement)
    {
        abort_if(Gate::denies('customer_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerManagementRequest $request)
    {
        CustomerManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
