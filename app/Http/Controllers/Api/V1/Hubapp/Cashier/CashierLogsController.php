<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\Hubapp\Cashier\CashierLogResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Log;

class CashierLogsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $logs = Log::with('user')->where('user_id',$user_id)->all();
        if(count($logs) > 0):
            return $this->sendResponse(new CashierLogResource($logs),'logs List');
        else:
            return $this->sendError('No logs Exist.');
        endif;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['action'] ='login';
        $inputs['ip'] = $request->ip();
        $createLog = Log::create($inputs);

        if(count($createLog) > 0):
            return $this->sendResponse(new CashierLogResource($createLog),'Log Created successfully');
        else:
            return $this->sendError('logs Not Created. ');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
