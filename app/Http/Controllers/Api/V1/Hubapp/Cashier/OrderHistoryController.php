<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\OrderHistoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use Carbon\Carbon;

class OrderHistoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$order = Order::all();
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
        //
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


    /***
    *  Get today order records 
    * @return \Illuminate\Http\Response 
    */
    public function todayOrderHistory(){
         
        $todayorder = Order::whereIn('order_status',['cancel','complete','refund'])
                            ->whereDate('created_at',Carbon::now()->toDateString() )
                            ->get(); 

        if(count($todayorder) > 0):
            return $this->sendResponse(true,'orderHistory','orderhistory','Today order history.',new OrderHistoryResource($todayorder),200);
        else:
            return $this->sendResponse(false,'orderHistory','orderhistory','Today no order history.');
        endif;
    }


    /***
     * Get only current order 
     *  @return \Illuminate\Http\Response
     * order status :: ['pending','cooking','pickup','ondelivery']
     * 
     */
    public function currentOrderHistory(){
        $currentOrder = Order::whereIn('order_status',['pending','cooking','pickup','ondelivery'])->get(); 

        if(count($currentOrder) > 0):
            return $this->sendResponse(true,'currentOrder','orderhistory','Current order history.',new OrderHistoryResource($currentOrder),200);
        else:
            return $this->sendResponse(false,'currentOrder','orderhistory','not any current history.');
        endif;

    }



    /***
     * Get all order history 
     *  @return \Illuminate\Http\Response
     * 
     */
    public function allOrderHistory(Request $request){

        $history = Order::whereIn('order_status',['cancel','complete','refund']);
            if($request['week_start'] != '' &&  $request['week_end'] != ''){
                $orderhistory =$history->whereBetween('created_at',[$request['week_start'],$request['week_end']]);
            }else{
                $orderhistory = $history->where('created_at', '>', Carbon::now()->subDays(7)->toDateString());
            }
       
        $allorderhistory = $orderhistory->get(); 

        if(count($allorderhistory) > 0):
            return $this->sendResponse(true,'orderHistory','orderhistory','Current order history.',new OrderHistoryResource($allorderhistory),200);
        else:
            return $this->sendResponse(false,'orderHistory','orderhistory','not any old history.');
        endif;
    }


    /** 
     * Order history Filter
     *  @filter
     * @order
     */
    public function orderHistoryFilter(Request $request){

        $filter = Order::with(['transaction','customers','ordertakenbies']);
            if($request->search != ''){
                $filter->where(function($query) use ($request){
                    $query->where('order_status','LIKE',$request->search);
                });
            }
            if($request->search == 'all'){
                // dd($request->search);
                $filter->orWhere(function($query) use ($request){
                    $query->where('order_status','!=',$request->search);
                });  
            }
        $mainfilter =  $filter->get();

       
        if(count($mainfilter) > 0):
            return $this->sendResponse(true,'orderFilter','orderFilter','Order Filter Result.',new OrderHistoryResource($mainfilter),200);
        else:
            return $this->sendResponse(false,'orderFilter','orderFilter','No records.');
        endif;                   
      
    }


    /***
    * 
    * 
    * 
    */
    // public function 









}
