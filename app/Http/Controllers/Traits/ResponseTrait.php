<?php 
namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait ResponseTrait{

    public function  sendResponse($ok,$name,$statusText,$message,$data=[]){

        $response = [
            'ok'        => $ok,
            'name'      => $name,
            'statusText'=> $statusText,
            'message'   => $message,        
            'data'      => $data
        ];
        return response()->json($response);
    }

}
