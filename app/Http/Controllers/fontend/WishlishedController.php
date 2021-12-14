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
        $product_id = $request->product_id;
        if ($request->session()->has('wishlist')) {
            // $wishlist = $this->session->userdata('wishlist');
            $wishlist = $request->session()->get('wishlist');

        }
        array_push($wishlist, $product_id);
        $wishlist = array_unique($wishlist);
        $request->session()->put('wishlist', $wishlist);
        Session::put("total_wishlist_count",count($wishlist));

        return response()->json(count($wishlist));

    }

    public function wishlist(Request $request)
    {

        $wishlist = $request->session()->get('wishlist');

        if ($request->session()->has('wishlist')) {
            $wishlist = $request->session()->get('wishlist');
            $data['products'] = DB::table('product')->whereIn('product_id', $wishlist)->get();

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
        $wishlist = array();

        $product_id = $request->product_id;
        if ($request->session()->has('wishlist')) {
            // $wishlist = $this->session->userdata('wishlist');
            $wishlist = $request->session()->get('wishlist');
        }

        $key = array_search($product_id, $wishlist);
        unset($wishlist[$key]);
        $wishlist = array_values($wishlist);
        ///  $this->session->set_userdata('wishlist', $wishlist);
        $request->session()->put('wishlist', $wishlist);
        $products = DB::table('product')->whereIn('product_id', $wishlist)->get();

        $view = view('fontend.wishlist.wishlist_ajax', compact('products'))->render();

        return response()->json(['html' => $view]);
    }


}
