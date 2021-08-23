<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Hubapp\Cashier\AppSynchronizeResource;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;


class AppSynchronizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::all();
        if($setting):
            return $this->sendResponse(true,'AppSynchronize','GetAppSynchronize','App Synchronize.',new AppSynchronizeResource($setting),200);
        else:
            return $this->sendResponse(false,'AppSynchronize','not
            AppSynchronize','App Not Synchronize.',[]);
        endif;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'key'=>'required',
            'value'=>'required',      
        ]);
   
        if($validator->fails()){
            return $this->sendResponse(false,'AppSynchronic','App Synchronic Validation error','',new AppSynchronizeResource($validator->errors()),404);     
        }

        $setting = Setting::all();
        if($setting):
            return $this->sendResponse(true,'AppSynchronic','GetAppSynchronize','New Setting Added.',new AppSynchronizeResource($setting),200);
        else:
            return $this->sendResponse(false,'AppSynchronizeError','AppSynchronize','Setting not Added.',[]);
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
        $editsetting  = Setting::find($id);
        if($editsetting):
            return $this->sendResponse(true,'EditSetting','EditSetting','Edit setting.',new AppSynchronizeResource($editsetting),200);               
        else:
            return $this->sendResponse(false,'EditSetting','EditSetting',' Setting Not Edit.',[]);  
        endif;
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
        $updatedSetting = Setting::findOrFail($id);
        $updatedSetting->update($request->all());
        if($updatedSetting):
            return $this->sendResponse(true,'updateSetting','UpdateSettingSuccess','Setting Updated Successfully.',new AppSynchronizeResource($updatedSetting),200);   
        else:
            return $this->sendResponse(false,'updateSetting','UpdateSettingError','Setting not updated');
        endif;
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
