<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use DB;
use Cart;

class CartController extends Controller
{
    
    public function add_to_cart(Request $request)
    {

       $product_id=$request->product_id;
       $quntity=$request->quntity;
        $product=DB::table('product')->where('product_id',$product_id)->first();
       // $image=$product->

        if($product->discount_price){
            $price=$product->discount_price;

        } else{
            $price=$product->product_price;
        }
        $product_title=$product->product_title;
        $picture=$request->picture;
       //////////////$url url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }};
        Cart::add(array(
            'id' => $product_id, // inique row ID
            'name' => $product_title,
            'price' => $price,
            'quantity' => $quntity,
            'attributes' => array('picture'=>$picture)
        ));
        $items = \Cart::getContent();
        //Cart::clear();
        $total=0;
        $quantity=0;
        foreach($items as $row) {

            $total = \Cart::getTotal();
            $quantity +=$row->quantity;

        }
        $quantity= Cart::getContent()->count();
//        $data['total']=$total;
//        $data['count']=$quantity;
        $data1=[
            'total'=>$total,
            'count'=>$quantity,
        ];

        return response()->json(['result'=>$data1]);



    }


    public function cart()
    {
        $data['share_picture'] = get_option('home_share_image');
        $data['seo_title'] = get_option('home_seo_title');
        $data['seo_keywords'] = get_option('home_seo_keywords');
        $data['seo_description'] = get_option('home_seo_content');
        /////     $data['order']=DB::table('order_data')->where('order_id',$id)->first();
        //    $data['categories']=DB::table('category')->select('category_id','category_title','category_name')->where('parent_id',0)->get();
        return view('fontend.cart.cart', $data);
    }

    public function plus_cart_item(Request $request)
    {
        if ($request->ajax()) {
            $product_id = $request->get('product_id');
            Cart::update($product_id, array(
                'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));
            //  return view('website.category_ajax', compact('products'));
            $view = view('fontend.cart.cart_ajax')->render();
            $items = \Cart::getContent();
            //Cart::clear();
            $total = 0;
            $quantity = 0;
            foreach ($items as $row) {
                $total = \Cart::getTotal();
                $quantity += $row->quantity;
            }
            $quantity = Cart::getContent()->count();
//        $data['total']=$total;
//        $data['count']=$quantity;
            $data1 = [
                'total' => $total,
                'count' => $quantity,
            ];

            // return response()->json(['result'=>$data1]);

            return response()->json(['html' => $view, 'result' => $data1]);
        }

    }

    public function minus_cart_item(Request $request)
    {
        if ($request->ajax()) {

            $product_id = $request->get('product_id');
            Cart::update($product_id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));

            //  return view('website.category_ajax', compact('products'));
            $view = view('fontend.cart.cart_ajax')->render();

            $items = \Cart::getContent();
            //Cart::clear();
            $total = 0;
            $quantity = 0;
            foreach ($items as $row) {

                $total = \Cart::getTotal();
                $quantity += $row->quantity;

            }
            $quantity = Cart::getContent()->count();
//        $data['total']=$total;
//        $data['count']=$quantity;
            $data1 = [
                'total' => $total,
                'count' => $quantity,
            ];

            // return response()->json(['result'=>$data1]);

            return response()->json(['html' => $view, 'result' => $data1]);
        }

    }

    public function remove_cart_item(Request $request)
    {
        if ($request->ajax()) {

            $product_id = $request->get('product_id');
            Cart::remove($product_id);
            //  return view('website.category_ajax', compact('products'));
            $view = view('fontend.cart.cart_ajax')->render();
            $items = \Cart::getContent();
            //Cart::clear();
            $total = 0;
            $quantity = 0;
            foreach ($items as $row) {

                $total = \Cart::getTotal();
                $quantity += $row->quantity;

            }
            $quantity = Cart::getContent()->count();
//        $data['total']=$total;
//        $data['count']=$quantity;
            $data1 = [
                'total' => $total,
                'count' => $quantity,
            ];

            // return response()->json(['result'=>$data1]);

            return response()->json(['html' => $view, 'result' => $data1]);
        }

    }


    public function hotdealProduct(Request $request){


        $products =DB::table('product')->orderBy('discount','DESC')->paginate(30);
        $view = view('website.hotdeal_product',compact('products'))->render();
        return response()->json(['html'=>$view]);

    }

    public function relatedProduct(Request $request){

        $product_id =$request->product_id;

        $related_category= DB::table('product_category_relation')->select('category_id')->where('product_id',$request->product_id)->limit(30)->get();
        if ($related_category) {
            foreach ($related_category as $pcat) {
                $related_category_id[] = $pcat->category_id;
            }
            $related_category = $related_category_id;
        }
        $products =DB::table('product')->select('product.product_id', 'product_title', 'product_name', 'discount_price', 'product_price', 'folder', 'feasured_image', 'sku')
            ->join('product_category_relation','product_category_relation.product_id','=','product.product_id')
            ->whereNotIn('category_id', [1])->whereIn('category_id',$related_category)
            ->where('product.status','=',1)->orderBy('modified_time','DESC')->limit(30)->get();
         $view = view('website.related_product',compact('products'))->render();
        return response()->json(['html'=>$view]);

    }
 
    public function add_to_review(Request $request)
    {
      $data['rating']=$request->rating;
      $data['product_id']=$request->product_id;
      $data['name']=$request->name;
      $data['email']=$request->email;
      $data['comment']=$request->comment;
      $data['created_time']=date('Y-m-d h:i:s');
      DB::table('review')->insert($data);
    }

    

}
