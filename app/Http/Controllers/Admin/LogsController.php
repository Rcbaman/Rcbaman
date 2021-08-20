<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLogRequest;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use App\Models\Log;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $logs = Log::with(['user'])->get();

        $users = User::get();

        return view('admin.logs.index', compact('logs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.logs.create', compact('users'));
    }

    public function store(StoreLogRequest $request)
    {
        $log = Log::create($request->all());

        return redirect()->route('admin.logs.index');
    }

    public function edit(Log $log)
    {
        abort_if(Gate::denies('log_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $log->load('user');

        return view('admin.logs.edit', compact('users', 'log'));
    }

    public function update(UpdateLogRequest $request, Log $log)
    {
        $log->update($request->all());

        return redirect()->route('admin.logs.index');
    }

    public function show(Log $log)
    {
        abort_if(Gate::denies('log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $log->load('user');

        return view('admin.logs.show', compact('log'));
    }

    public function destroy(Log $log)
    {
        abort_if(Gate::denies('log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $log->delete();

        return back();
    }

    public function massDestroy(MassDestroyLogRequest $request)
    {
        Log::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
