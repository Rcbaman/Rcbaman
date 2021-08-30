<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductProfileRequest;
use App\Http\Requests\StoreProductProfileRequest;
use App\Http\Requests\UpdateProductProfileRequest;
use App\Models\ProductProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productProfiles = ProductProfile::all();

        return view('admin.productProfiles.index', compact('productProfiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productProfiles.create');
    }

    public function store(StoreProductProfileRequest $request)
    {
        $productProfile = ProductProfile::create($request->all());

        return redirect()->route('admin.product-profiles.index');
    }

    public function edit(ProductProfile $productProfile)
    {
        abort_if(Gate::denies('product_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productProfiles.edit', compact('productProfile'));
    }

    public function update(UpdateProductProfileRequest $request, ProductProfile $productProfile)
    {
        $productProfile->update($request->all());

        return redirect()->route('admin.product-profiles.index');
    }

    public function show(ProductProfile $productProfile)
    {
        abort_if(Gate::denies('product_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productProfile->load('profileProducts');

        return view('admin.productProfiles.show', compact('productProfile'));
    }

    public function destroy(ProductProfile $productProfile)
    {
        abort_if(Gate::denies('product_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductProfileRequest $request)
    {
        ProductProfile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
