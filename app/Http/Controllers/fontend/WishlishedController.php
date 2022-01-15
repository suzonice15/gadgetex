<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use DB;
use  Cart;
use Session;
use Illuminate\Support\Facades\Cookie;

class WishlishedController extends Controller
{


    public function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");     //Country which we are selecting.
    }
 
    public function add_to_wishlist(Request $request)
    {
        // $request->session()->put('my_name','Virat Gandhi');
        $wishlist = array();
        $user_id=Session::get('customer_id');
        $product_id = $request->product_id;
    $result=DB::table('wishlist')->where('product_id',$product_id)->where('user_id',$user_id)->first();
    if($result){
       $data['result']="no";
    }else{       
        $row_data['user_id']= $user_id;
        $row_data['product_id']= $product_id;
        $row_data['created_at']= date('Y-m-d H:i:s');                
        DB::table('wishlist')->insert($row_data);
        $data['result']="yes";
    }

   $data['count']= DB::table('wishlist')->where('user_id',$user_id)->count();
       
        return response()->json($data);

    }

    public function wishlist(Request $request)
    {
        $user_id=Session::get('customer_id');
       $product_id= DB::table('wishlist')->where('user_id',$user_id)->pluck('product_id');
       if( $product_id){
            $data['products'] = DB::table('product')->whereIn('product_id', $product_id)->get();

        } else {
            $data['products'] = '';

        }

        $data['seo_title'] = get_option('home_seo_title');
        $data['seo_keywords'] = get_option('home_seo_keywords');
        $data['seo_description'] = get_option('home_seo_content');
        $data['share_picture'] = get_option('home_share_image');
        return view('fontend.wishlist.wishlist', $data);


    }

    public function remove_wish_list(Request $request)
    {
     

        $product_id = $request->product_id;  
        $user_id=Session::get('customer_id');
        DB::table('wishlist')->where('user_id',$user_id)->where('product_id', $product_id)->delete();
        $product_id= DB::table('wishlist')->where('user_id',$user_id)->pluck('product_id');
        if( $product_id){
             $products = DB::table('product')->whereIn('product_id', $product_id)->get();
 
         } else {
             $products = '';
 
         }
 

 

        $view = view('fontend.wishlist.wishlist_ajax', compact('products'))->render();

        $count= DB::table('wishlist')->where('user_id',$user_id)->count();
        return response()->json(['html' => $view,'count'=>$count]);
    }

    public function add_to_compare(Request $request)
    {
        // $request->session()->put('my_name','Virat Gandhi');
        $compare = array();
        $product_id = $request->product_id;
        if ($request->session()->has('compare')) {
            // $wishlist = $this->session->userdata('wishlist');
            $compare = $request->session()->get('compare');

        }
        array_push($compare, $product_id);
        $compare = array_unique($compare);
        $request->session()->put('compare', $compare);
      

    }

    public function compare(Request $request)
    {

        $compare = $request->session()->get('compare');
        if ($request->session()->has('compare')) {
            $compare = $request->session()->get('compare');
            $data['products'] = DB::table('product')->whereIn('product_id', $compare)->orderBy('product_id','desc')->get();

        } else {
            $data['products'] = array();
        }
        $data['seo_title'] = get_option('home_seo_title');
        $data['seo_keywords'] = get_option('home_seo_keywords');
        $data['seo_description'] = get_option('home_seo_content');
        $data['share_picture'] = get_option('home_share_image');
        return view('fontend.compare.compare', $data);


    }

    public function remove_compare(Request $request)
    {
     
        $product_id=$request->product_id;
        
        $compare = $request->session()->get('compare');
        if ($request->session()->has('compare')) {
            $compare = $request->session()->get('compare');
            $key = array_search($product_id, $compare);
            unset($compare[$key]);
            $compare = array_values($compare);
            $request->session()->put('compare', $compare);


        }
        $data['products'] = DB::table('product')->whereIn('product_id', $compare)->orderBy('product_id','desc')->get();

        return view('fontend.compare.ajax_compare', $data);


    }
    
    


}
