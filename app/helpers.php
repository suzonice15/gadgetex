<?php

use Jenssegers\Agent\Agent;

function getWishlistData(){

    $user_id=Session::get('customer_id');
    if( $user_id){
        $count= DB::table('wishlist')->where('user_id',$user_id)->count();

    }else{
         $count=0;
    }
    return $count;
    
}

function mobileTabletCheck(){  
$agent = new Agent();
$mobile=$agent->isMobile();
$tablet=$agent->isTablet();
if($mobile==1 || $tablet==1){
   
    return 1;
}else{
    return 0;  
}

}

function get_option($key)
{
    $result = DB::table('options')->select('option_value')->where('option_name', $key)->first();
    if ($result) {
        return $result->option_value;
    }
}

 
function get_option_of_affilite($key)
{
    $result = DB::table('affilate_options')->select('option_value')->where('option_name', $key)->first();
    if ($result) {
        return $result->option_value;
    }
}

function get_category_info($category_id)
{
    $result=DB::table('category')->select('category_title','category_name','medium_banner')->where('category_id',$category_id)->first();

    if($result){
        return $result;

    }
}

function getHomePageProductByCategoryID($category_id){
   return  DB::table('product')->select('discount','main_category_id','product_ram_rom','product.product_id','product_title','product_name','discount_price','product_price','folder','feasured_image')
        ->where('product.main_category_id',$category_id)
        ->where('product.product_type',"home")
        ->where('status','=',1)->orderBy('order_by','asc')
        ->limit(12)->get();
}

function single_product_information($product_id)
{
    $result=DB::table('product')->select('sku','product_name','product_title','product_stock')->where('product_id',$product_id)->first();

    if($result){
        return $result;

    }
}
function single_vendor_product($product_id)
{
    $result=DB::table('product')->select('*')->where('product_id',$product_id)->first();
    if($result){
        return $result;
    }
}

function UpdateStatisticCommisionData($amount){
    $statisticsData=DB::table('statistics')->first();
    $statistics['total_income']=$statisticsData->total_income+$amount;
    DB::table('statistics')->update($statistics);
}
function totalProductRiviewCount($product_id){
    return DB::table('review')->select('product_id')->where('product_id',$product_id)->count();
}
function getParentCategoryName($category_id){
    $result=DB::table('category')->select('category_title','category_name','parent_id')->where('category_id',$category_id)->first();
    if($result){
        echo "<a href=''.url('/category').'/'.$result->category_name.' class='text-decoration-none' style='color:black'> $result->category_title  </a>";
    }
    
}

