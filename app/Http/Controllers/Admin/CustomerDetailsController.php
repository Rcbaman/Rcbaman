<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerDetailRequest;
use App\Http\Requests\StoreCustomerDetailRequest;
use App\Http\Requests\UpdateCustomerDetailRequest;
use App\Models\CustomerDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDetails = CustomerDetail::all();

        return view('admin.customerDetails.index', compact('customerDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDetails.create');
    }

    public function store(StoreCustomerDetailRequest $request)
    {
        $customerDetail = CustomerDetail::create($request->all());

        return redirect()->route('admin.customer-details.index');
    }

    public function edit(CustomerDetail $customerDetail)
    {
        abort_if(Gate::denies('customer_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerDetails.edit', compact('customerDetail'));
    }

    public function update(UpdateCustomerDetailRequest $request, CustomerDetail $customerDetail)
    {
        $customerDetail->update($request->all());

        return redirect()->route('admin.customer-details.index');
    }

    public function show(CustomerDetail $customerDetail)
    {
        abort_if(Gate::denies('customer_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDetail->load('customerCustomerAddresses');

        return view('admin.customerDetails.show', compact('customerDetail'));
    }

    public function destroy(CustomerDetail $customerDetail)
    {
        abort_if(Gate::denies('customer_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerDetailRequest $request)
    {
        CustomerDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
