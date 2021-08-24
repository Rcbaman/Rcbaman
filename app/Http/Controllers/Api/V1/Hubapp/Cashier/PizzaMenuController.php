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
        $products = Product::with(['productProductCategories','productProductVariationSizes','productProductCrustSizes','productProductIngredients'])->get();
        dd($products);
    }


    public function productIdByProductInfo($category_id){
        $products = Product::with(['productProductCategories','productProductVariationSizes','productProductCrustSizes','productProductIngredients'])->where('id',$category_id)->get();
    }


}
