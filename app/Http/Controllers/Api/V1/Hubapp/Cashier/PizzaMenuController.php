<?php

namespace App\Http\Controllers\Api\V1\Hubapp\Cashier;

use App\Http\Controllers\Api\V1\Hubapp\Cashier\BaseController as BaseController;
use App\Http\Resources\Hubapp\Cashier\PizzaMenuResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;



class PizzaMenuController extends BaseController
{
    
    public function categoryByProduct(){
        $products = Product::with(['productProductVariationSizes','productProductCrustSizes','productProductIngredients'])->get();
    }


    public function productIdByProductInfo($product_id){
        $products = Product::with(['productProductVariationSizes','productProductCrustSizes','productProductIngredients'])->where('id',$product_id)->get();
    }


}
