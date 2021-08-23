<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

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
            'first_name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',            
        ]);
   
        if($validator->fails()){
            return $this->sendResponse(false,'UserRegistration','Registration Validation error','',new CashierAuthResource($validator->errors()),404);     
        }
   
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->roles()->sync(5);
        
        if($request->file('profile_photo')) {
            if ($user->profile_photo) {
                $user->profile_photo->delete();
            }
            $user->addMediaFromRequest('profile_photo')->toMediaCollection('profile_photo');
        }
    
        $success['token'] =  $user->createToken("MyCashierUser")->plainTextToken;
        $success['token_type'] = 'Bearer';
        $success['user'] =  $user;
        
        return $this->sendResponse(true,'UserRegistration','authorized','User register successfully',new CashierAuthResource($success),200);
        
    }



     /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function Login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])):
                      
            $success['token'] = Auth::user()->createToken("MyCashierUser")->plainTextToken;
            $success['token_type'] = 'Bearer'; 
            $success['user'] =  Auth::user();           

            return $this->sendResponse(true,'UserLogin','authorized','User login successfully',new CashierAuthResource($success),200);
        else:
            return $this->sendResponse(false,'UserLogin','unauthorized','Please enter your correct email and password',[],401);
        endif;
    }

    /**
     * user profile api
     * @return \Illuminate\Http\Response
     */
    public function Profile(){
        $user = Auth::user();
        if($user):
            return $this->sendResponse(true,'UserProfile','authorized','User Profile info',new CashierAuthResource($user),200);
        else:
            return $this->sendResponse( false,'UserProfile',"Unauthorised","Unauthorised user Profile",[],404);
        endif;
    }
}
