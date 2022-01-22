<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use File;
use Image;

use  Session;
use Webp;
use AdminHelper;
use URL;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public  function __construct()
    {
        
    }
    public function index()
    {
        
        $data['main'] = 'Products';
        $data['active'] = 'All Products';
        $data['site_title'] = 'All Products';
        $data['title'] = '  ';
        $products = DB::table('product')->orderBy('product_id', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'), $data);
    }
   

public  function  unpublishedProduct(){
 
    $data['main'] = 'Products';
    $data['active'] = 'All Products';
    $data['title'] = '  ';
    $products = DB::table('product')->where('status',0)->orderBy('product_id', 'desc')->paginate(50);

    return view('admin.product.index', compact('products'), $data);
}
    
    public function TopDealProducts(){

        $data['main'] = 'Top Deal Products';
        $data['active'] = 'Top Deal Products';
        $data['title'] = '  ';
        $products = DB::table('product')->where('top_deal' ,'>',0)
            ->orderBy('top_deal', 'desc')->get();
        return view('admin.product.TopDealProducts', compact('products'), $data);
    }

    public function staffProduct()
    {
        
        $data['main'] = 'Products';
        $data['active'] = 'All Products';
        $data['title'] = '  ';
        $products = DB::table('product')->where('purchase_price','')->where('status',0)->orderBy('product_id', 'desc')->paginate(10);

        return view('admin.product.staffProduct', compact('products'), $data);
    }

    public function pagination(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $search_query = str_replace(" ", "%", $query);
            $products = DB::table('product')
                
                ->where(function ($query_row) use ($search_query) {
                    return $query_row->where('sku','LIKE','%'.$search_query.'%')
                        ->orWhere('product_title','LIKE','%'.$search_query.'%');
                })
                ->orderBy('product_id', 'desc')->paginate(10);
            return view('admin.product.pagination', compact('products'));
        }
    }


    public function create()
    {
         
        $sku_row= DB::table('product')->select('product_id')->orderBy('product_id','desc')->first();
        $sku=$sku_row->product_id;
        if($sku < 10){
            $data['sku']  ='000'.$sku;
        } else if( $sku > 10 and $sku < 100){
            $data['sku']  ='00'.$sku;
        } else {
            $data['sku']  =$sku;
        }
        $data['site_title'] = 'Add New Product';
        $data['main'] = 'Products';
        $data['active'] = 'Add New Product';
        $data['title'] = '  ';
        $data['bands']=DB::table('bands')->get();
        $data['categories'] = DB::table('category')->where('parent_id', 0)->orderBy('category_id', 'ASC')->get();
       $data['colors']= DB::table('product_color')->orderBy('product_color_id', 'desc')->get();
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {

        $product_id=DB::table('product')->max('product_id');
        if($product_id){
            $folder=$product_id+1;
        }else{
            $folder=1;
        }
        date_default_timezone_set('Asia/Dhaka');
        $media_path = 'uploads/' . $folder;
        $orginalpath = public_path() . '/uploads/' . $folder;
        $small = $orginalpath . '/' . 'small';
        $thumb = $orginalpath . '/' . 'thumb';
        File::makeDirectory($small, $mode = 0777, true, true);
        File::makeDirectory($thumb, $mode = 0777, true, true);
        $data['product_title'] = $request->product_title;
        $data['product_ram_rom'] = $request->product_ram_rom;
        $data['brand_id'] = $request->brand_id;
        $data['order_by'] = $request->order_by;
        $sell_price=0;
        $pont_price=0;
        
         $data['folder'] = $folder;
         $data['main_category_id'] = $request->main_category_id;
         $data['sub_category'] = $request->sub_category;
        $data['product_name'] = $request->product_name.'-'.rand(451,635);
         $data['product_price'] = $request->product_price;
        $status= Session::get('status');
        if ($status != 'editor') {
        $data['purchase_price'] = $request->purchase_price;
        $data['status'] = $request->status;
        }else{
            $data['status'] = 0;
        }
        $data['warenty'] = $request->warenty;
        $data['emi'] = $request->emi;
        $data['discount_price'] = $request->discount_price;
        $data['warranty_policy'] = $request->warranty_policy;
        $data['delivery_in_dhaka'] = $request->delivery_in_dhaka;
        $data['delivery_out_dhaka'] = $request->delivery_out_dhaka;
        $data['product_description'] = $request->product_description;
        $data['product_terms'] = $request->product_terms;
        $data['sku'] = $request->sku;
        $data['product_specification'] = $request->product_specification;
        $data['product_stock'] = $request->product_stock;
        $data['stock_alert'] = $request->stock_alert;
        $data['product_video'] = $request->product_video;
        $data['product_type'] = $request->product_type;
        $data['created_time'] = date('Y-m-d H:i:s');
        $data['modified_time'] = date('Y-m-d H:i:s');
        $data['seo_title'] = $request->seo_title;
        $data['seo_keywords'] = $request->seo_keywords;
        $data['seo_content'] = $request->seo_content;

        if ($request->discount_price) {
            $price = $request->product_price - $request->discount_price;
            $discount = round(($price * 100) / ($request->product_price));
            $data['discount'] = $discount;
        }
        $product_id = DB::table('product')->insertGetId($data);
        $product_image1 = $request->file('product_image1');
        $product_image2 = $request->file('product_image2');
        $product_image3 = $request->file('product_image3');
        $product_image4 = $request->file('product_image4');
        $product_image5 = $request->file('product_image5');
        $product_image6 = $request->file('product_image6');
        $product_image7 = $request->file('product_image7');
        $product_image8 = $request->file('product_image8');
        $product_image9 = $request->file('product_image9');
        $product_image10 = $request->file('product_image10');

   $featured_image_orgianal = $request->file('featured_image');
        if ($featured_image_orgianal) {
            // $image_name = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image = $product_id . '.' . $featured_image_orgianal->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_image = Image::make($featured_image_orgianal->getRealPath());
            $resize_image->resize(1000, 1000, function ($constraint) {

            })->save($destinationPath . '/' . $featured_image);

            $resize_image->resize(200, 200, function ($constraint) {
            })->save($thumb . '/' . $featured_image);
            $resize_image->resize(50, 50, function ($constraint) {
            })->save($small . '/' . $featured_image);
            $image_row_data['feasured_image'] = $featured_image;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'featured_image';
            $media_data['media_path'] = $media_path . '/' . $featured_image;
            DB::table('media')->insert($media_data);


        }
        if ($product_image1) {
            $random_number1 = rand(10, 100);
            $galary_image1 = $random_number1 . '.' . $product_image1->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image1 = Image::make($product_image1->getRealPath());
            $resize_galary_image1->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image1);
            $image_row_data['galary_image_1'] = $galary_image1;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'galary_image1';
            $media_data['media_path'] = $media_path . '/' . $galary_image1;
            DB::table('media')->insert($media_data);
        }
        if ($product_image2) {
            $random_number2 = rand(10, 100);
            $galary_image2 = $random_number2 . '.' . $product_image2->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image2 = Image::make($product_image2->getRealPath());
            $resize_galary_image2->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image2);
            $image_row_data['galary_image_2'] = $galary_image2;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'galary_image2';
            $media_data['media_path'] = $media_path . '/' . $galary_image2;
            DB::table('media')->insert($media_data);
        }
        if ($product_image3) {
            $random_number3 = rand(10, 100);
            $galary_image3 = $random_number3 . '.' . $product_image3->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image3 = Image::make($product_image3->getRealPath());
            $resize_galary_image3->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image3);
            $image_row_data['galary_image_3'] = $galary_image3;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'galary_image3';
            $media_data['media_path'] = $media_path . '/' . $galary_image3;
            DB::table('media')->insert($media_data);
        }
        if ($product_image4) {
            $random_number4 = rand(10, 100);
            $galary_image4 = $random_number4 . '.' . $product_image4->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image4 = Image::make($product_image4->getRealPath());
            $resize_galary_image4->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image4);
            $image_row_data['galary_image_4'] = $galary_image4;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'galary_image4';
            $media_data['media_path'] = $media_path . '/' . $galary_image4;
            DB::table('media')->insert($media_data);
        }
        if ($product_image5) {
            $random_number5 = rand(10, 100);
            $galary_image5 = $random_number5 . '.' . $product_image5->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image5 = Image::make($product_image5->getRealPath());
            $resize_galary_image5->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image5);
            $image_row_data['galary_image_5'] = $galary_image5;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'galary_image5';
            $media_data['media_path'] = $media_path . '/' . $galary_image5;
            DB::table('media')->insert($media_data);
        }
        if ($product_image6) {
            $random_number6 = rand(10, 100);
            $galary_image6 = $random_number6 . '.' . $product_image6->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image6 = Image::make($product_image6->getRealPath());
            $resize_galary_image6->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image6);
            $image_row_data['galary_image_6'] = $galary_image6;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image6;
            $media_data['media_type'] = 'galary_image6';
            DB::table('media')->insert($media_data);
        }
      
        if ($product_image7) {
            $random_number7 = rand(10, 100);
            $galary_image7 = $random_number7 . '.' . $product_image7->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image7 = Image::make($product_image6->getRealPath());
            $resize_galary_image7->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image7);
            $image_row_data['galary_image_7'] = $galary_image7;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image7;
            $media_data['media_type'] = 'galary_image7';
            DB::table('media')->insert($media_data);
        }
        if ($product_image8) {
            $random_number8 = rand(10, 100);
            $galary_image8 = $random_number8 . '.' . $product_image8->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image8 = Image::make($product_image8->getRealPath());
            $resize_galary_image8->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image8);
            $image_row_data['galary_image_8'] = $galary_image8;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image8;
            $media_data['media_type'] = 'galary_image8';
            DB::table('media')->insert($media_data);
        }
        if ($product_image9) {
            $random_number9 = rand(10, 100);
            $galary_image9 = $random_number9 . '.' . $product_image9->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image9 = Image::make($product_image9->getRealPath());
            $resize_galary_image9->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image9);
            $image_row_data['galary_image_9'] = $galary_image9;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image9;
            $media_data['media_type'] = 'galary_image9';
            DB::table('media')->insert($media_data);
        }

        if ($product_image10) {
            $random_number10 = rand(10, 100);
            $galary_image10 = $random_number10 . '.' . $product_image10->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image10 = Image::make($product_image10->getRealPath());
            $resize_galary_image10->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image10);
            $image_row_data['galary_image_10'] = $galary_image10;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image10;
            $media_data['media_type'] = 'galary_image10';
            DB::table('media')->insert($media_data);
        }

        DB::table('product')->where('product_id', $product_id)->update($image_row_data);

         $colors=$request->color;
       if($colors[0] !=''){

           foreach($colors as $key=>$color){

               $color_code=DB::table('product_color')->where('product_color_id',$color)->first();
               $color_array[] =array(
                   'product_id'=>$product_id,
                   'color_id'=>$color,
                   'color_code'=>$color_code->color_code,
                   'color_name'=>$color_code->product_color_name,
               );
           }

           DB::table('product_color_by_product_id')->insert($color_array);
       }

       $value=$request->value;
       $value=$request->value;
       if($value[0] !=''){
           foreach($value as $key=>$row){
               if( $value[$key]==''){
                   continue;
               }

               $newarray[] =array(
                   'product_id'=>$product_id,
                   'value'=>$value[$key],
               );

           }
           DB::table('specifications')->insert($newarray);
       }


      
        if ($product_id) {
            return redirect('admin/products')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/product/create')
                ->with('error', 'No successfully.');
        }

    }
    
    




    public function show($id)
    {

    }


    public function edit($id)
    {

        $data['product'] = DB::table('product')->where('product_id', $id)->first();
        if( $data['product'] ){
            $data['main'] = 'Products';
            $data['active'] = 'Update Products';
            $data['title'] = 'Update User Registration Form';
            $data['categories'] = DB::table('category')->where('parent_id', 0)->orderBy('category_id', 'ASC')->get();  
            $data['sub_categories'] = DB::table('category')->where('parent_id', '!=',0)->orderBy('category_id', 'ASC')->get();  
            $data['specifications'] = DB::table('specifications')->where('product_id', '=',$id)->orderBy('id', 'ASC')->get();
            $data['bands']=DB::table('bands')->get();
            $data['colors']= DB::table('product_color')->orderBy('product_color_id', 'desc')->get();
            return view('admin.product.edit', $data);

        } else {
            return redirect('admin/products');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {

        date_default_timezone_set('Asia/Dhaka');
        $discount_price_row=DB::table('product')->select('discount_price')->where('product_id',$product_id)->first(); 

        $media_path = 'uploads/' . $request->folder;
        $orginalpath = public_path() . '/uploads/' . $request->folder;
        $small = $orginalpath . '/' . 'small';
        $thumb = $orginalpath . '/' . 'thumb';
        $sell_price=0;
        $pont_price=0;
        $data['product_ram_rom'] = $request->product_ram_rom;
        $data['main_category_id'] = $request->main_category_id;
         $data['sub_category'] = $request->sub_category;
        $data['product_title'] = $request->product_title;
        $data['folder'] = $request->folder;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $status= Session::get('status'); 
        if ($status != 'editor') {
            $data['purchase_price'] = $request->purchase_price;
            $data['status'] = $request->status;
          
        }else{
            $data['status'] = 0;
        }
        $data['warenty'] = $request->warenty;
        $data['emi'] = $request->emi;
        $data['brand_id'] = $request->brand_id;
        $data['product_specification'] = $request->product_specification;
        $data['order_by'] = $request->order_by;
        $data['discount_price'] = $request->discount_price;
        $data['warranty_policy'] = $request->warranty_policy;
        $data['delivery_in_dhaka'] = $request->delivery_in_dhaka;
        $data['delivery_out_dhaka'] = $request->delivery_out_dhaka;
        $data['product_description'] = $request->product_description;
        $data['product_terms'] = $request->product_terms;
        $data['sku'] = $request->sku;
        $data['product_stock'] = $request->product_stock;
        $data['product_type'] = $request->product_type;
        $data['product_video'] = $request->product_video;
        $data['modified_time'] = date('Y-m-d H:i:s');
        $data['seo_title'] = $request->seo_title;
        $data['seo_keywords'] = $request->seo_keywords;
        $data['seo_content'] = $request->seo_content;
        if ($request->discount_price) {
            $price = $request->product_price - $request->discount_price;
            $discount = round(($price * 100) / ($request->product_price));
            $data['discount'] = $discount;
        }
        DB::table('product')->where('product_id', $product_id)->update($data);
        $featured_image_orgianal = $request->file('featured_image');
        $product_image1 = $request->file('product_image1');
        $product_image2 = $request->file('product_image2');
        $product_image3 = $request->file('product_image3');
        $product_image4 = $request->file('product_image4');
        $product_image5 = $request->file('product_image5');
        $product_image6 = $request->file('product_image6');
        $product_image7 = $request->file('product_image7');
        $product_image8 = $request->file('product_image8');
        $product_image9 = $request->file('product_image9');
        $product_image10 = $request->file('product_image10');
        if ($featured_image_orgianal) {
            // $image_name = time().'.'.$featured_image->getClientOriginalExtension();
            $featured_image = $product_id . '.' . $featured_image_orgianal->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_image = Image::make($featured_image_orgianal->getRealPath());
            $resize_image->resize(700, 700, function ($constraint) {
            })->save($destinationPath . '/' . $featured_image);
            $resize_image->resize(200, 200, function ($constraint) {

            })->save($thumb . '/' . $featured_image);

            $resize_image->resize(50, 50, function ($constraint) {

            })->save($small . '/' . $featured_image);
            $data['feasured_image'] = $featured_image;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_type'] = 'featured_image';
            $media_data['media_path'] = $media_path . '/' . $featured_image;
            //DB::table('media')->insert($media_data);
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'featured_image')->update($media_data);


        }
        if ($product_image1) {
            $random_number1 = rand(10, 100);
            $galary_image1 = $random_number1 . '.' . $product_image1->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image1 = Image::make($product_image1->getRealPath());
            $resize_galary_image1->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image1);
            $data['galary_image_1'] = $galary_image1;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image1;
            $media_data['media_type'] = 'galary_image_1';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_1')->update($media_data);


        }
        if ($product_image2) {
            $random_number2 = rand(10, 100);
            $galary_image2 = $random_number2 . '.' . $product_image2->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image2 = Image::make($product_image2->getRealPath());
            $resize_galary_image2->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image2);
            $data['galary_image_2'] = $galary_image2;

            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image2;
            $media_data['media_type'] = 'galary_image_2';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_2')->update($media_data);

        }
        if ($product_image3) {
            $random_number3 = rand(10, 100);
            $galary_image3 = $random_number3 . '.' . $product_image3->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image3 = Image::make($product_image3->getRealPath());
            $resize_galary_image3->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image3);
            $data['galary_image_3'] = $galary_image3;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image3;
            $media_data['media_type'] = 'galary_image_3';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_3')->update($media_data);

        }
        if ($product_image4) {
            $random_number4 = rand(10, 100);
            $galary_image4 = $random_number4 . '.' . $product_image4->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image4 = Image::make($product_image4->getRealPath());
            $resize_galary_image4->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image4);
            $data['galary_image_4'] = $galary_image4;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image4;
            $media_data['media_type'] = 'galary_image_4';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_4')->update($media_data);

        }
        if ($product_image5) {
            $random_number5 = rand(10, 100);
            $galary_image5 = $random_number5 . '.' . $product_image5->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image5 = Image::make($product_image5->getRealPath());
            $resize_galary_image5->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image5);
            $data['galary_image_5'] = $galary_image5;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image5;
            $media_data['media_type'] = 'galary_image_5';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_5')->update($media_data);

        }
        if ($product_image6) {
            $random_number6 = rand(10, 100);
            $galary_image6 = $random_number6 . '.' . $product_image6->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image6 = Image::make($product_image6->getRealPath());
            $resize_galary_image6->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image6);
            $data['galary_image_6'] = $galary_image6;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image6;
            $media_data['media_type'] = 'galary_image_6';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_6')->update($media_data);

        }

        if ($product_image7) {
            $random_number7 = rand(10, 100);
            $galary_image7 = $random_number7 . '.' . $product_image7->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image7 = Image::make($product_image7->getRealPath());
            $resize_galary_image7->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image7);
            $data['galary_image_7'] = $galary_image7;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image7;
            $media_data['media_type'] = 'galary_image_7';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_7')->update($media_data);

        }
        if ($product_image8) {
            $random_number8 = rand(10, 100);
            $galary_image8 = $random_number8 . '.' . $product_image8->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image8 = Image::make($product_image8->getRealPath());
            $resize_galary_image8->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image8);
            $data['galary_image_8'] = $galary_image8;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image8;
            $media_data['media_type'] = 'galary_image_8';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_8')->update($media_data);

        }
        if ($product_image9) {
            $random_number9 = rand(10, 100);
            $galary_image9 = $random_number9 . '.' . $product_image9->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image9 = Image::make($product_image9->getRealPath());
            $resize_galary_image9->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image9);
            $data['galary_image_9'] = $galary_image9;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image9;
            $media_data['media_type'] = 'galary_image_9';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_9')->update($media_data);

        }
        if ($product_image10) {
            $random_number10 = rand(10, 100);
            $galary_image10 = $random_number10 . '.' . $product_image10->getClientOriginalName();
            $destinationPath = $orginalpath;
            $resize_galary_image10 = Image::make($product_image10->getRealPath());
            $resize_galary_image10->resize(700, 700, function ($constraint) {

            })->save($destinationPath . '/' . $galary_image10);
            $data['galary_image_10'] = $galary_image10;
            $media_data['media_title'] = $request->product_title;
            $media_data['product_id'] = $product_id;
            $media_data['product_code'] = $request->sku;
            $media_data['created_time'] = date('Y-m-d H:i:s');
            $media_data['modified_time'] = date('Y-m-d H:i:s');
            $media_data['media_path'] = $media_path . '/' . $galary_image10;
            $media_data['media_type'] = 'galary_image_10';
            DB::table('media')->where('product_id', $product_id)->where('media_type', 'galary_image_10')->update($media_data);

        }


        $colors=$request->color;
        if($colors[0] !=''){
            DB::table('product_color_by_product_id')->where('product_id',$product_id)->delete();
            foreach($colors as $key=>$color){
                $color_code=DB::table('product_color')->where('product_color_id',$color)->first();
                $color_array[] =array(
                    'product_id'=>$product_id,
                    'color_id'=>$color,
                    'color_code'=>$color_code->color_code,
                    'color_name'=>$color_code->product_color_name,
                );

            }
            DB::table('product_color_by_product_id')->insert($color_array);
        }




        $value=$request->value;

        if($value[0] !=''){
            DB::table('specifications')->where('product_id', $product_id)->delete();
            foreach($value as $key=>$row){
                if($value[$key]==''){
                    continue;
                }

                $newarray[] =array(
                    'product_id'=>$product_id,
                    'value'=>$value[$key],
                );

            }
            DB::table('specifications')->insert($newarray);
        }



        DB::table('product')->where('product_id', $product_id)->update($data); 
        if ($product_id) {
            return redirect('admin/products')
                ->with('success', 'Update successfully.');
        } else {
            return redirect('admin/product/create')
                ->with('error', 'No successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = DB::table('product')->where('product_id', $id)->delete();
        if ($result) {
            return redirect('admin/products')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/products')
                ->with('error', 'No successfully.');
        }

    }

    public function urlCheck(Request $request)
    {
        $product_name = $request->get('url');
        $result = DB::table('product')->where('product_name', $product_name)->first();
        if ($result) {
            echo 'This product exit';
        } else {
            echo '';
        }
    }
    public function getSubCategoryForProduct(Request $request)
    {
        $main_category_id = $request->get('main_category_id');
        $categories = DB::table('category')->where('parent_id', $main_category_id)->get();
        $bands = DB::table('bands')->where('category_id', $main_category_id)->get();
        $html_category ="<select name='sub_category' class='form-control select2'><option value=''>----Select Category----</option>";
        foreach($categories as $row){
            $html_category .="<option value='$row->category_id'>$row->category_title</option>";
        }
        $html_category .="</select>";


         $html_band="<select name='brand_id' class='form-control select2'><option value=''>----Select Brand----</option>";
        foreach($bands as $row){
            $html_band .="<option value='$row->brand_id'>$row->brand_name</option>";
        }
        $html_band .="</select>";





        $data['category']=$html_category;
        $data['brands']=$html_band;
        return response()->json($data);

    }

    public function ProductColor(Request $request)
    {
        $method = $request->method();
        $data['check'] = '';


        if ($request->isMethod('post') && $request->target=="save"){
            $insert_data['color_code']=$request->color_code;
            $insert_data['product_color_name']=$request->product_color_name;
            DB::table('product_color')->insert($insert_data);
            return redirect('admin/product/color');
        }

        if($request->target=="delete"){


            DB::table('product_color')->where('product_color_id',$request->product_color_id)->delete();
            return redirect('admin/product/color');
        }

        if($request->target=="update"){
            $update_insert_data['color_code']=$request->color_code;
            $update_insert_data['product_color_name']=$request->product_color_name;
            DB::table('product_color')->where('product_color_id',$request->product_color_id)->update($update_insert_data);
            return redirect('admin/product/color');
        }

        if($request->target=="edit"){
            $data['check'] = 'edit';

            $data['color'] = DB::table('product_color')->where('product_color_id',$request->product_color_id)->first();

        }



        $data['main'] = 'Products Color';
        $data['active'] = 'All Products Color';
        $data['site_title'] = 'All Products Color';
        $data['title'] = '  ';
        $colors = DB::table('product_color')->orderBy('product_color_id', 'desc')->get();
        return view('admin.product.productColor', compact('colors'), $data);
    }


    public function getProductDetailMediaFile(){
       $data['products']= DB::table('product_detail_media')->orderBy('id','desc')->get();

        return view('admin.product.getProductDetailMediaFile', $data);

    }

    public function productDetailImageUpload(Request $request){

        $id= DB::table('product_detail_media')->max('id');

        if($id){
            $name  =$id+1;
        }  else {
            $name=1;
        }

        $image = $request->file('picture');
        $new_name =  $name.'.' . $image->extension();
        $image->move(public_path('uploads/product_detail'), $new_name);
        $row_data['picture']='uploads/product_detail/'.$new_name;
        $row_data['created_at']=date("Y-m-d");
        DB::table('product_detail_media')->insert($row_data);


    }

    public function productDetailMediaDelete($id){

          $result=DB::table('product_detail_media')->where('id',$id)->first();

        File::delete($result->picture);
         DB::table('product_detail_media')->where('id',$id)->delete();

    }

    public function productLocationChanged(Request $request){
$id=$request->productId;
        $result=DB::table('product')->where('product_id',$id)->value('product_type');
        if($result=='home'){
            $data['product_type']='general';
        }else{
            $data['product_type']='home';
        }


        DB::table('product')->where('product_id',$id)->update($data);

    }







    public function foldercheck(Request $request)
    {
        //  $product_name = $request->get('url');
        $result = DB::table('product')->orderby('product_id', 'desc')->first();
        if ($result) {
            $product_id = $result->product_id;
            $product_id = $product_id + 1;
            echo $product_id;
        } else {
            echo '1';
        }
    }
}
