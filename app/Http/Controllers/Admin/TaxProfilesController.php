<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaxProfileRequest;
use App\Http\Requests\StoreTaxProfileRequest;
use App\Http\Requests\UpdateTaxProfileRequest;
use App\Models\TaxProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaxProfilesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxProfiles = TaxProfile::all();

        return view('admin.taxProfiles.index', compact('taxProfiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('tax_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxProfiles.create');
    }

    public function store(StoreTaxProfileRequest $request)
    {
        $taxProfile = TaxProfile::create($request->all());

        return redirect()->route('admin.tax-profiles.index');
    }

    public function edit(TaxProfile $taxProfile)
    {
        abort_if(Gate::denies('tax_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxProfiles.edit', compact('taxProfile'));
    }

    public function update(UpdateTaxProfileRequest $request, TaxProfile $taxProfile)
    {
        $taxProfile->update($request->all());

        return redirect()->route('admin.tax-profiles.index');
    }

    public function show(TaxProfile $taxProfile)
    {
        abort_if(Gate::denies('tax_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.taxProfiles.show', compact('taxProfile'));
    }

    public function destroy(TaxProfile $taxProfile)
    {
        abort_if(Gate::denies('tax_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaxProfileRequest $request)
    {
        TaxProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
