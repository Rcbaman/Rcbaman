<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerAddressRequest;
use App\Http\Requests\StoreCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Models\CustomerAddress;
use App\Models\CustomerDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAddressesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddresses = CustomerAddress::with(['customer'])->get();

        $customer_details = CustomerDetail::get();

        return view('admin.customerAddresses.index', compact('customerAddresses', 'customer_details'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CustomerDetail::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerAddresses.create', compact('customers'));
    }

    public function store(StoreCustomerAddressRequest $request)
    {
        $customerAddress = CustomerAddress::create($request->all());

        return redirect()->route('admin.customer-addresses.index');
    }

    public function edit(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CustomerDetail::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerAddress->load('customer');

        return view('admin.customerAddresses.edit', compact('customers', 'customerAddress'));
    }

    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customerAddress)
    {
        $customerAddress->update($request->all());

        return redirect()->route('admin.customer-addresses.index');
    }

    public function show(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddress->load('customer');

        return view('admin.customerAddresses.show', compact('customerAddress'));
    }

    public function destroy(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerAddressRequest $request)
    {
        CustomerAddress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
