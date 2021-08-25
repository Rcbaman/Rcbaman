<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrustSizeRequest;
use App\Http\Requests\StoreCrustSizeRequest;
use App\Http\Requests\UpdateCrustSizeRequest;
use App\Models\Crust;
use App\Models\CrustSize;
use App\Models\VariationsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrustSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crust_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crustSizes = CrustSize::with(['crust', 'size'])->get();

        $crusts = Crust::get();

        $variations_sizes = VariationsSize::get();

        return view('admin.crustSizes.index', compact('crustSizes', 'crusts', 'variations_sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('crust_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crusts = Crust::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crustSizes.create', compact('crusts', 'sizes'));
    }

    public function store(StoreCrustSizeRequest $request)
    {
        $crustSize = CrustSize::create($request->all());

        return redirect()->route('admin.crust-sizes.index');
    }

    public function edit(CrustSize $crustSize)
    {
        abort_if(Gate::denies('crust_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crusts = Crust::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = VariationsSize::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crustSize->load('crust', 'size');

        return view('admin.crustSizes.edit', compact('crusts', 'sizes', 'crustSize'));
    }

    public function update(UpdateCrustSizeRequest $request, CrustSize $crustSize)
    {
        $crustSize->update($request->all());

        return redirect()->route('admin.crust-sizes.index');
    }

    public function show(CrustSize $crustSize)
    {
        abort_if(Gate::denies('crust_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crustSize->load('crust', 'size');

        return view('admin.crustSizes.show', compact('crustSize'));
    }

    public function destroy(CrustSize $crustSize)
    {
        abort_if(Gate::denies('crust_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crustSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrustSizeRequest $request)
    {
        CrustSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
