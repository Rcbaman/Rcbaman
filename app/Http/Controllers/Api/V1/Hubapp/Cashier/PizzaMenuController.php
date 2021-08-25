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

        $products = Product::with(['categories','profile','Crusts.crusts','Ingredients.ingredients','Sizes.size', 'Sizes.size.sizeCrustSizes'])
        ->where(function($query) use($category_id){
            $query->whereHas('categories',function($query) use($category_id){
                $query->where('category_id',$category_id);
            });
        })->get();

        if(count($products) > 0):
            return $this->sendResponse(true,'categorybyProduct','categorybyProductsuccess','product List.',new PizzaMenuResource($products),200);
        else:
            return $this->sendResponse(false,'categorybyProduct','categorybyProducterror','No product in List.');
        endif;
    }

    public function GetProductByCategory(){
        
        $products = Category::with(['products','products.profile','products.Crusts.crusts','products.Ingredients.ingredients','products.Sizes.size', 'products.Sizes.size.sizeCrustSizes'])->get();

        if(count($products) > 0):
            return $this->sendResponse(true,'categorybyProduct','categorybyProductsuccess','product List.',new PizzaMenuResource($products),200);
        else:
            return $this->sendResponse(false,'categorybyProduct','categorybyProducterror','No product in List.');
        endif;

    }



}
