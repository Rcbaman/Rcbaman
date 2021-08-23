<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\CashierWithCustomerResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\CustomerDetail;
use App\Models\CustomerAddress;
use App\Models\Transaction;
use App\Models\Order;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class CashierWithCustomerController extends BaseController
{
    /**
     *  Check Customer has account or not 
     *  @check by Email and phone number
     * 
     */
    public function customerExistOrNot(Request $request){

        $existCustomer  = CustomerDetail::with(['customerAddresses'])
            ->where(function($query) use($request){
                $query->where('mobile_number',$request['mobile_number']);
                $query->orWhere('email',$request['email']);
            })->get();
        
        if($existCustomer):
            return $this->sendResponse(true,'customerAlreadyExist','checkCustomer','Customer has already account.',new CashierWithCustomerResource($existCustomer),200);
        else:
            return $this->sendResponse(false,'customerAlreadyExist','checkCustomer','Customer has not any account.',[]);
        endif;

    }

    /**
     * NEW CUSTOMER REGISTRATION
     * @CUSTOMER
     */
    public function addNewCustomer(Request $request){
          
        $validator = Validator::make($request->all(), [
            'first_name'    =>'required',
            'last_name'     =>'required',
            'email'         => 'required|email|unique:customer_details',
            'mobile_number' => 'required|min:10|max:10|unique:customer_details,mobile_number',          
            'dob'           => 'required',
            'gender'        => 'required',
        ]);

        if($validator->fails()){
            return $this->sendResponse(false,'Customerregistration','Registration Validation error','',new CashierWithCustomerResource($validator->errors()),404);
        }

        $input = $request->all();
        $newCustomer = CustomerDetail::create($input);
        if($newCustomer):
            return $this->sendResponse(true,'customerRegistration','registrationSuccessfully','Customer register successfully.',new CashierWithCustomerResource($newCustomer),200);        
        else:
            return $this->sendResponse(false,'customerRegistration','registrationError','Customer not register successfully.');
        endif;
    }


    /***
     * Add New Addresses For Customer
     *  @customer Addresses
     */
    Public function addCustomerAddress(Request $request){

        $validator = Validator::make($request->all(), [
            'address'  =>'required',
            'address_2'=>'required',
            'country'  => 'required',
            'state'    => 'required',          
            'zip'      => 'required',
        ]);

        if($validator->fails()){
            return $this->sendResponse(false,'newAddress','Address Validation error','',new CashierWithCustomerResource($validator->errors()),404);    
        }

        $input = $request->all();
        $newaddress = CustomerAddress::create($input);
        if($newaddress):
            return $this->sendResponse(true,'newAddress','addressAddedSuccessfully','New Address added successfully.',new CashierWithCustomerResource($newaddress),200);                
        else:
            return $this->sendResponse(false,'newAddress','newAddressError','New Address not added.'[]);
        endif;
    }


    /***
     * Edit Address
     *  
     */
    public function editCustomerAddress($id){
        $address  = CustomerAddress::find($id);
        if($address):
            return $this->sendResponse(true,'editAddress','AddressEditSuccessfully','Edit Address.',new CashierWithCustomerResource($address),200);               
        else:
            return $this->sendResponse(false,'editAddress','AddressEditError','Edit Address.',[]);  
        endif;
    }

    /**
     * Update address
     * 
     */
    public function updateCustomerAddress(Request $request,$id){
        $address = CustomerAddress::findOrFail($id);
        $address->update($request->all());
        if($address):
            return $this->sendResponse(true,'updateAddress','AddressupdatedSuccessfully','Address Updated Successfully.',new CashierWithCustomerResource($address),200);            
        else:
            return $this->sendResponse(false,'updateAddress','AddressupdatedError','Address not updated');
        endif;
    }


    /***
     * Delete Address
     * 
     */
    public function deleteCustomerAddress(Request $request, $id){

        $address = CustomerAddress::findOrFail($id);
        $address->delete();
        if($address):
            return $this->sendResponse(true,'deleteAddress','AddressdeleteSuccessfully','Address Deleted Successfully.',new CashierWithCustomerResource($address),200);           
        else:
            return $this->sendResponse(true,'deleteAddress','AddressNotdelete','Address not Deleted.',[]); 
        endif;
    }


    /**
     *  Cashier add Payment 
     * 
     */

    function addNewPayment(Request $request){
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'method'       =>'required',
            'sub_total'    =>'required',
            'tax'          => 'required',
            'other_charges'=> 'required',          
            'amount'       => 'required',
        ]);

        if($validator->fails()){
            return $this->sendResponse(false,'payment Error','Payment validation Error ','',new CashierWithCustomerResource($validator->errors()),404);       
        }

        $transaction = Transaction::create($input);

        if($transaction):   
            $data = [
                'total_amount'  =>$request['amount'],
                'order_status'  =>'pending',
                'transaction_id'=>$transaction->id
            ]; 
            $order = Order::create($input);
            return $this->sendResponse(true,'transaction','NewTransaction','Transaction successfully.',new CashierWithCustomerResource($order),200);     
        else:
            return $this->sendError(false,'transaction','NewTransaction','Transaction not successfully.');
        endif;
    }



  

    
    

}
