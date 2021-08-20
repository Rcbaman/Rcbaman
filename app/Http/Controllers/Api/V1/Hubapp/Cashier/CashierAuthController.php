<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\Hubapp\Cashier\CashierAuthResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Controllers\Traits\MediaUploadingTrait;


class CashierAuthController extends BaseController
{
    use MediaUploadingTrait;

     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        $input['password'] = Hash::make($input['password']);
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $user = User::create($input);
        $user->roles()->sync(5);
        
        if($request->file('profile_photo')) {
            if ($user->profile_photo) {
                $user->profile_photo->delete();
            }
            $user->addMediaFromRequest('profile_photo')->toMediaCollection('profile_photo');
        }
    
        $success['token'] =  $user->createToken('MyCashierUser')->plainTextToken;
        $success['token_type'] =  'Bearer';
        $success['user'] =  $user;
                   
        return $this->sendResponse(new CashierAuthResource($success),'User register successfully.');
        
    }



     /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function Login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])):
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyCashierUser')->plainTextToken;
            $success['token_type'] = 'Bearer'; 
            $success['user'] =  $user;
            return $this->sendResponse(new CashierAuthResource($success),'User login successfully.', 200);
           
        else:
            return $this->sendError('Please enter your correct email and password.', ['error'=>'Unauthorised'], 404);
        endif;
    }

    /**
     * user profile api
     * @return \Illuminate\Http\Response
     */
    public function Profile(){
        $user = Auth::user();
       
        if($user):
            return $this->sendResponse(new CashierAuthResource($user),'User Profile info');
        else:
            return $this->sendError('Unauthorised user.',['error'=>'Unauthorised'], 404);
        endif;
    }
}
