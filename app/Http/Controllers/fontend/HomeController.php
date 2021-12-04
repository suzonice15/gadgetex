<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){

        $data['bands']=DB::table('bands')->get();
        $data['product_categories']=DB::table('category')->where('parent_id','=',0)->get();
        return view('fontend.home.home',$data);
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

    public function product($product_name)
    {
        $data['product'] = DB::table('product')->select('*')
            ->where('product_name', $product_name)
            ->where('status', '=', 1)
            ->first();
        if ($data['product']) {
//            $category_row = DB::table('product')->select('category.parent_id', 'category_title', 'category_name')
//                ->join('product_category_relation', 'product_category_relation.product_id', '=', 'product.product_id')
//                ->join('category', 'category.category_id', '=', 'product_category_relation.category_id')
//                ->where('product_name', $product_name)
//                ->orderBy('category.category_id', 'DESC')
//                ->first();
            $data['page_title'] = $data['product']->product_title;
            $data['seo_title'] = $data['product']->seo_title;
            $data['seo_keywords'] = $data['product']->seo_keywords;
            $data['seo_description'] = $data['product']->seo_content;
            $data['share_picture'] = url('/public/uploads/') . '/' . $data['product']->folder . '/' . $data['product']->feasured_image;
      //      $category_id = $category_row->parent_id;
//            $category_row_second = DB::table('category')->select('category.parent_id', 'category_title', 'category_name')->where('category_id', $category_id)->first();
//            if ($category_row_second) {
//                $category_id = $category_row_second->parent_id;
//                $data['category_name_middle'] = $category_row_second->category_name;
//                $data['category_title_middle'] = $category_row_second->category_title;
//                $category_row_first = DB::table('category')->select('category.parent_id', 'category_title', 'category_name')->where('category_id', $category_id)->first();
//                if ($category_row_first) {
//                    $data['category_name_first'] = $category_row_first->category_name;
//                    $data['category_title_first'] = $category_row_first->category_title;
//                }
//            }
         //   $data['category_name_last'] = $category_row->category_name;
           // $data['category_title_last'] = $category_row->category_title;

            $data['specifications'] = DB::table('specifications') 
                ->where('product_id',  $data['product']->product_id)
                
                ->get();



            $data['related_products']=DB::table('product')
                ->select('product.product_id', 'discount_price', 'product_price', 'product_ram_rom','product_name', 'folder', 'feasured_image', 'product_title')               
                ->where('main_category_id',$data['product']->sub_category)
                ->orWhere('sub_category',$data['product']->sub_category)
                ->orderBy('modified_time', 'DESC')
                ->limit(20)->get();
            
             
            

            return view('fontend.product.product', $data);
        } else {
            $data['seo_title'] = get_option('home_seo_title');
            $data['seo_keywords'] = get_option('home_seo_keywords');
            $data['seo_description'] = get_option('home_seo_content');
            $data['share_picture'] = get_option('home_share_image');
            $data['page'] = DB::table('page')->select('*')->where('page_link', $product_name)->first();
            if ($data['page']) {
                return view('website.page', $data);
            }

        }
    }




    public function about(){
    	return view('fontend.about.about');
    }
    public function myoffer(){
       
    	return view('fontend.myoffer.myoffer');
    }
    public function takeguide(){
    	return view('fontend.takeguide');
    }
     
}
