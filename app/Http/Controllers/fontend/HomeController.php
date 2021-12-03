<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        return view('fontend.home.home');
    }
    public function category($category_name){

        $category_row = DB::table('category')
            ->select('category_id','share_image', 'parent_id', 'category_name', 'category_title','medium_banner', 'seo_title', 'seo_keywords', 'seo_content')
            ->where('category_name', $category_name)
            ->first();



        if ($category_row) {

            $category_row_id = $category_row->category_id;
            $data['products'] = DB::table('product')
                ->select('product.product_id', 'discount_price','product_ram_rom', 'product_price', 'product_name', 'folder', 'feasured_image', 'product_title')
                ->where('product.status', '=', 1)
                ->where('main_category_id', $category_row_id)
                ->orWhere('sub_category', $category_row_id)
                ->orderBy('modified_time', 'DESC')
                ->paginate(12);
            $category_id = $category_row->parent_id;
            $category_row_second = DB::table('category')
                ->select('category.parent_id', 'category_title', 'category_name')
                ->where('category_id', $category_id)->first();

            if ($category_row_second) {
                $category_id = $category_row_second->parent_id;

                $data['category_name_middle'] = $category_row_second->category_name;
                $data['category_title_middle'] = $category_row_second->category_title;
                $category_row_first = DB::table('category')
                    ->select('category.parent_id', 'category_title', 'category_name')
                    ->where('category_id', $category_id)
                    ->first();
                if ($category_row_first) {
                    $data['category_name_first'] = $category_row_first->category_name;
                    $data['category_title_first'] = $category_row_first->category_title;
                }

            }


            $data['category_name_last'] = $category_row->category_name;
            $data['category_name'] = $category_name;
            $data['category_title_last'] = $category_row->category_title;
            $data['share_picture'] = url('/') . '/' . $category_row->share_image;
            $data['medium_banner'] = $category_row->medium_banner;
            $data['seo_title'] = $category_row->seo_title;
            $data['seo_keywords'] = $category_row->seo_keywords;
            $data['seo_description'] = $category_row->seo_content;
            $data['category_row_id'] = $category_row_id;

            return view('fontend.category.category',$data);
        } else{
            return redirect('/');
        }


    }


public  function  ajaxCategoryClickProduct(Request $request){
    $order_by=$request->order_by;
    $query = DB::table('product')
        ->select('product.product_id', 'discount_price', 'product_price','product_ram_rom', 'product_name', 'folder', 'feasured_image', 'product_title')
        ->where('product.status', '=', 1)
        ->where('main_category_id', $request->category_id)
        ->orWhere('sub_category', $request->category_id);

    if($order_by=="name_asc"){
        $query->orderBy('product_title', 'ASC');
    }else if($order_by=="name_desc"){
        $query->orderBy('product_title', 'DESC');
    }else if($order_by=="price_asc"){
        $query->orderBy('product_price', 'ASC');
    }else if($order_by=="price_desc"){
        $query->orderBy('product_price', 'DESC');
    } else{
        $query->orderBy('modified_time', 'DESC');
    }
     $query->orderBy('modified_time', 'DESC');
    $products=  $query->paginate($request->per_page);
    $view = view('fontend.category.ajax_category', compact('products'))->render();


    return response()->json(['html' => $view]);

}

    public  function  ajaxCategoryProductSearch(Request $request){


        $search = $request->get('search');
        $product_title = str_replace(" ", "%", $search);
        $category_id=$request->category_id;
        $products = DB::table('product')
            ->select('product.product_id', 'discount_price', 'product_price', 'product_ram_rom','product_name', 'folder', 'feasured_image', 'product_title')
            ->where('product_title', 'like', '%' . $product_title . '%')
            ->where('main_category_id',$category_id)
         ->orderBy('modified_time', 'DESC')
        ->paginate(50);
        $view = view('fontend.category.ajax_category', compact('products'))->render();
        return response()->json(['html' => $view]);

    }

    public function product(){
    	return view('fontend.product.product');
    }

    public function about(){
    	return view('fontend.about.about');
    }

     
}
