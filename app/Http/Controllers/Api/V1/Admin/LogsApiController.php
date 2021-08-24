<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLogRequest;
use App\Http\Requests\UpdateLogRequest;
use App\Http\Resources\Admin\LogResource;
use App\Models\Log;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LogResource(Log::with(['user'])->get());
    }

    public function store(StoreLogRequest $request)
    {
        $log = Log::create($request->all());

        return (new LogResource($log))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Log $log)
    {
        abort_if(Gate::denies('log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LogResource($log->load(['user']));
    }

    public function update(UpdateLogRequest $request, Log $log)
    {
        $log->update($request->all());

        return (new LogResource($log))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Log $log)
    {
        abort_if(Gate::denies('log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $log->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
