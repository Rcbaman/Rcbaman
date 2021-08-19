<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\CashierWithCustomerResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerDetail;
use App\Models\CustomerAddress;
use App\Models\Transaction;
use App\Models\Order;
use Validator;
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
            return $this->sendResponse(new CashierWithCustomerResource($existCustomer),'Customer has already account.');
        else:
            return $this->sendError('Customer has not any account.');
        endif;

    }

    /**
     * NEW CUSTOMER REGISTRATION
     * @CUSTOMER
     */
    public function addNewCustomer(Request $request){
          
        $validator = Validator::make($request->all(), [
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => 'required|email|unique:customer_details',
            'mobile_number' => 'required|min:10|max:10|unique:customer_details,mobile_number',          
            'dob' => 'required',
            'gender' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $newCustomer = CustomerDetail::create($input);
        if($newCustomer):               
            return $this->sendResponse(new CashierWithCustomerResource($newCustomer),'Customer register successfully.');
        else:
            return $this->sendError('Customer not insert.', ['error'=>'Something wrong'], 404);
        endif;
    }


    /***
     * Add New Addresses For Customer
     *  @customer Addresses
     */
    Public function addCustomerAddress(Request $request){

        $validator = Validator::make($request->all(), [
            'address'=>'required',
            'address_2'=>'required',
            'country' => 'required',
            'state' => 'required',          
            'zip' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $newaddress = CustomerAddress::create($input);
        if($newaddress):               
            return $this->sendResponse(new CashierWithCustomerResource($newaddress),'New Address added successfully.');
        else:
            return $this->sendError('New Address not added.');
        endif;
    }


    /***
     * Edit Address
     *  
     */
    public function editAddress($id){
        $address  = CustomerAddress::where('id',$id)->first();
        if($address):               
            return $this->sendResponse(new CashierWithCustomerResource($address),'Edit Address.');
        else:
            return $this->sendError('Not any address.');
        endif;
    }

    /**
     * Update address
     * 
     */
    public function updateAddress(Request $request,$id){
        $address = CustomerAddress::where('id',$id)->update($request->all());
        if($address):               
            return $this->sendResponse(new CashierWithCustomerResource($address),'Update Address Successfully.');
        else:
            return $this->sendError('Address not updated.');
        endif;
    }


    /***
     * Delete Address
     * 
     */
    public function deleteAddress($id){
        $address = CustomerAddress::where('id',$id);
        $address->delete();
        if($address):               
            return $this->sendResponse(new CashierWithCustomerResource($address),'Address Deleted Successfully.');
        else:
            return $this->sendError('Address not Deleted.');
        endif;
    }


    /**
     *  Cashier add Payment 
     * 
     */

    function addNewPayment(Request $request){
        $input = $request->all();

        $validator = Validator::make($request->all(), [
            'method'=>'required',
            'sub_total'=>'required',
            'tax' => 'required',
            'other_charges' => 'required',          
            'amount' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $transaction = Transaction::create($input);

        if($transaction):   
            $data = [
                'total_amount' =>$request['amount'],
                'order_status' =>'Pending',
                'transaction_id' =>$transaction->id
            ]; 
            $order = Order::create($input);       
            return $this->sendResponse(new CashierWithCustomerResource($transaction),'Transaction successfully.');
        else:
            return $this->sendError('Transaction not successfully.');
        endif;



    }


}
