<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use DB;
use  Cart;
use Session;
use Illuminate\Support\Facades\Cookie;

class CheckOutController extends Controller
{
   

    public function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");     //Country which we are selecting.
    }

    public function checkout()
    {
        $items = \Cart::getContent();
        $data['share_picture'] = get_option('home_share_image');

        $data['seo_title'] = get_option('home_seo_title');
        $data['seo_keywords'] = get_option('home_seo_keywords');
        $data['seo_description'] = get_option('home_seo_content');


        $data['categories'] = DB::table('category')->select('category_id', 'category_title', 'category_name')->where('parent_id', 0)->get();

        return view('fontend.checkout.checkout', $data);
    }


    public function checkoutStore(Request $request)
    {

        $set_user_id2=0;
        $items = \Cart::getContent();
        foreach ($items as $row) {
            $product_id = $row->id;
            $row->quantity;
            $product_stock = DB::table('product')->select('product_stock')->where('product_id', $product_id)->first();
            if ($product_stock) {
                $stock['product_stock'] = $product_stock->product_stock - $row->quantity;
                $product_stock = DB::table('product')->where('product_id', $product_id)->update($stock);
            }
        }
        $data['order_status'] = 'new';
        $data['shipping_charge'] = $request->shipping_charge;
            $data['coupon_code'] = $request->coupon_code;

        $data['created_time'] = date("Y-m-d h:i:s");
        $data['created_by'] = 'Customer';
        //$data['modified_time'] = date("Y-m-d h:i:s");
        $data['order_date'] = date("Y-m-d");
        $data['order_total'] = $request->order_total;
        $data['products'] = serialize($request->products);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['customer_order_note'] = $request->customer_order_note;
        $data['staff_id'] = 0;
        $data['payment_type'] = $request->payment_type;
        $data['order_area'] = $request->order_area;
        $customer_id = Session::get('customer_id');



        $order_id = DB::table('order_data')->insertGetId($data);
        $row_data['order_id'] = $order_id;
        if ($order_id) { 
            return redirect('thank-you?order_id=' . $order_id);
        } else {

            return redirect('/chechout')->with('error', 'Error to Create this order');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thankYou(Request $request)
    {
        $items = \Cart::clear();
        $data['seo_title'] = get_option('home_seo_title');
        $data['seo_keywords'] = get_option('home_seo_keywords');
        $data['seo_description'] = get_option('home_seo_content');
        $id = $request->order_id;
        $data['order'] = DB::table('order_data')->where('order_id', $id)->first();
        $track_data ['order_id'] = $data['order']->order_id;
        $track_data ['date'] = $data['order']->order_date;
        $order_items = unserialize($data['order']->products);
        if (is_array($order_items['items'])) {
            foreach ($order_items['items'] as $product_id => $item) {
                $products_sku = DB::table('product')->select('sku')->where('product_id', '=', $product_id)->first();
                if($products_sku){
                    $track_data ['product_code'] = $products_sku->sku;
                    DB::table('product_of_order_data')->insert($track_data);
                }
            }
        }
        $data['categories'] = DB::table('category')->select('category_id', 'category_title', 'category_name')->where('parent_id', 0)->get();
        $data['share_picture'] = get_option('home_share_image');
        return view('fontend.checkout.thank_you', $data);
    }

    

}
