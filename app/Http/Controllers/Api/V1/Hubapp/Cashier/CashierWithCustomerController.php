<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\CashierWithCustomerResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerManagement;
use App\Models\Address;
use Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class CashierWithCustomerController extends BaseController
{
    public function addNewCustomer(Request $request){

        $input = $request->all();

        $existCustomer  = CustomerManagement::with(['customerAddresses'])
            ->where(function($query) use($request){
                $query->where('mobile_number',$request['mobile_number']);
                $query->orWhere('email',$request['email']);
            })->first();
        
        if(isset($existCustomer) && $existCustomer != Null):
            return $this->sendResponse(new CashierWithCustomerResource($existCustomer),'Customer already account.');
        else:
            
            $validator = Validator::make($request->all(), [
                'mobile_number'=>'required',
                'first_name'=>'required',
                'last_name'=>'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'c_password' => 'required|same:password',            
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }

            $input = $request->all();
            $newCustomer = CustomerManagement::create($input);
            if($user):               
                return $this->sendResponse(new CashierWithCustomerResource($newCustomer),'Customer register successfully.');
            else:
                return $this->sendError('Customer not insert.', ['error'=>'Something wrong'], 404);
            endif;
        endif;

    }


    // $address = [
    //     'address' =>$request['address'],
    //     'address_2' =>$request['address_2'],
    //     'country' =>$request['country'],
    //     'state' =>$request['state'],
    //     'zip' =>$request['zip'],
    // ];
    // Addeess::create();
}
