<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\CashierQuickResource;
use App\Models\User;
use App\Models\Category;
use App\Models\Dish;


class CashierQuickController extends BaseController
{
    /***
     *  All Category 
     *  @category 
    */
    public function categoriesList(){

        $category = Category::all();

        if(count($category) > 0):
            return $this->sendResponse(new CashierQuickResource($category),'Catergory List');
        else:
            return $this->sendError('No Catergory Exist.');
        endif;
    }

    /****
     *  Pizza Menu
     *  @pizza list 
     */
    public function CategoriesByDishes($category_id){

        $dishs = Dish::with(['product','ingredients','crusts','categories'])->where('category_id',$category_id)->get();

        if(count($dishs) > 0):
            return $this->sendResponse(new CashierQuickResource($dishs),'Pizza menu List',200);
        else:
            return $this->sendError('No Pizza menu.');
        endif;
    }




}
