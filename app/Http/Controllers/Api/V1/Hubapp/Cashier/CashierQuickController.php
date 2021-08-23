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
            return $this->sendResponse(true,'CategoryList','CategoryList','Catergory List',new CashierQuickResource($category),200);
        else:
            return $this->sendResponse(false,'CategoryList','CategoryList','No Catergory Exist',new CashierQuickResource($category));
        endif;
    }

    /****
     *  Pizza Menu
     *  @pizza list 
     */
    public function CategoriesByDishes($category_id){

        $dishs = Dish::with(['product','ingredients','crusts','categories'])->where('category_id',$category_id)->get();

        if(count($dishs) > 0):
            return $this->sendResponse(true,'pizzamenuList','PizzaList','Pizza menu List',new CashierQuickResource($dishs),200);
        else:
            return $this->sendResponse(false,'pizzamenuList','PizzaList','No Pizza menu',[]);
        endif;
    }




}
