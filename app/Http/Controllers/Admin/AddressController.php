<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddressRequest;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Models\CustomerManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addresses = Address::with(['customers'])->get();

        $customer_managements = CustomerManagement::get();

        return view('admin.addresses.index', compact('addresses', 'customer_managements'));
    }

    public function create()
    {
        abort_if(Gate::denies('address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CustomerManagement::pluck('mobile_number', 'id');

        return view('admin.addresses.create', compact('customers'));
    }

    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->all());
        $address->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.addresses.index');
    }

    public function edit(Address $address)
    {
        abort_if(Gate::denies('address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CustomerManagement::pluck('mobile_number', 'id');

        $address->load('customers');

        return view('admin.addresses.edit', compact('customers', 'address'));
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());
        $address->customers()->sync($request->input('customers', []));

        return redirect()->route('admin.addresses.index');
    }

    public function show(Address $address)
    {
        abort_if(Gate::denies('address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address->load('customers');

        return view('admin.addresses.show', compact('address'));
    }

    public function destroy(Address $address)
    {
        abort_if(Gate::denies('address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $address->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddressRequest $request)
    {
        Address::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
