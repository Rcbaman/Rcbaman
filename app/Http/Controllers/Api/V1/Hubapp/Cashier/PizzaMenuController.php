<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\PizzaMenuResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;


class PizzaMenuController extends BaseController
{
    
    public function listOfCategory(){

        $category = Category::all();
        if(count($category) > 0):
            return $this->sendResponse(true,'categorylist','categorylistsuccess','Category List.',new PizzaMenuResource($category),200);
        else:
            return $this->sendResponse(false,'categorylist','catrgorylisterror','No Category in List.');
        endif;
    }


    public function productIdByProductInfo($category_id){
        $products = Product::with(['categories','profile','productProductSizes','productProductIngredients'])->get();
        if(count($products) > 0):
            return $this->sendResponse(true,'categorylist','categorylistsuccess','Category List.',new PizzaMenuResource($products),200);
        else:
            return $this->sendResponse(false,'categorylist','catrgorylisterror','No Category in List.');
        endif;
    }


}
