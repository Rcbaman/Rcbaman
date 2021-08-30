<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrustRequest;
use App\Http\Requests\StoreCrustRequest;
use App\Http\Requests\UpdateCrustRequest;
use App\Models\Crust;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrustsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crust_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crusts = Crust::all();

        return view('admin.crusts.index', compact('crusts'));
    }

    public function create()
    {
        abort_if(Gate::denies('crust_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crusts.create');
    }

    public function store(StoreCrustRequest $request)
    {
        $crust = Crust::create($request->all());

        return redirect()->route('admin.crusts.index');
    }

    public function edit(Crust $crust)
    {
        abort_if(Gate::denies('crust_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crusts.edit', compact('crust'));
    }

    public function update(UpdateCrustRequest $request, Crust $crust)
    {
        $crust->update($request->all());

        return redirect()->route('admin.crusts.index');
    }

    public function show(Crust $crust)
    {
        abort_if(Gate::denies('crust_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crust->load('crustCrustSizes', 'crustsProducts');

        return view('admin.crusts.show', compact('crust'));
    }

    public function destroy(Crust $crust)
    {
        abort_if(Gate::denies('crust_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crust->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrustRequest $request)
    {
        Crust::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
