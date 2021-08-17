<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVariationsSizeRequest;
use App\Http\Requests\StoreVariationsSizeRequest;
use App\Http\Requests\UpdateVariationsSizeRequest;
use App\Models\VariationsSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VariationsSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('variations_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variationsSizes = VariationsSize::all();

        return view('admin.variationsSizes.index', compact('variationsSizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('variations_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.variationsSizes.create');
    }

    public function store(StoreVariationsSizeRequest $request)
    {
        $variationsSize = VariationsSize::create($request->all());

        return redirect()->route('admin.variations-sizes.index');
    }

    public function edit(VariationsSize $variationsSize)
    {
        abort_if(Gate::denies('variations_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.variationsSizes.edit', compact('variationsSize'));
    }

    public function update(UpdateVariationsSizeRequest $request, VariationsSize $variationsSize)
    {
        $variationsSize->update($request->all());

        return redirect()->route('admin.variations-sizes.index');
    }

    public function show(VariationsSize $variationsSize)
    {
        abort_if(Gate::denies('variations_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variationsSize->load('variationsizeProductVariationSizes');

        return view('admin.variationsSizes.show', compact('variationsSize'));
    }

    public function destroy(VariationsSize $variationsSize)
    {
        abort_if(Gate::denies('variations_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variationsSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyVariationsSizeRequest $request)
    {
        VariationsSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
