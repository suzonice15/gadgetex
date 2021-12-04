<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  Session;
use Image;
use AdminHelper;
use URL;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    

    public  function __construct()
    {
       
    }

    public function index()
    {
         
        $data['main'] = 'Categories';
        $data['active'] = 'All Categories';
        $data['title'] = '  '; 
        $data['categories']= DB::table('category')->orderBy('category_id', 'desc')->paginate(10);
        return view('admin.category.index',$data);
    }

    public  function  fetch_data(Request $request){
        if($request->ajax())
        {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $categories = DB::table('category')
                ->orWhere('category_title', 'like', '%'.$query.'%')->paginate(10);
            return view('admin.category.pagination', compact('categories'));
        }

    }

   
    public function create()
    {
        

        $data['main'] = 'Categories';
        $data['active'] = 'All Categories';
        $data['title'] = '  ';
        $data['categories']=DB::table('category')->orderBy('category_title','ASC')->get();
        return view('admin.category.create', $data);

    }

    
    public function store(Request $request)
    {
        $data['category_title']=$request->category_title;
        $data['category_name']=$request->category_name;
        $data['parent_id']=$request->parent_id;
        $data['rank_order']=$request->rank_order;
        $data['status']=$request->status;
        $data['seo_title']=$request->seo_title;
        $data['seo_meta_title']=$request->seo_meta_title;
        $data['seo_keywords']=$request->seo_keywords;
        $data['seo_content']=$request->seo_content;
        $data['seo_meta_content']=$request->seo_meta_content;

        $image = $request->file('featured_image');
        $category_icon = $request->file('category_icon');
        $share_image = $request->file('share_image');




            $data['registered_date']=date('Y-m-d');
        $CategoryID =DB::table('category')->insertGetId($data);


        if ($image) {

            $image_name =$CategoryID . '_banner_.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['medium_banner']=$image_name;

        }
        if ($category_icon) {

            $image_name = $CategoryID . '_icon_.' . $category_icon->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($category_icon->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['category_icon']=$image_name;
        }


        if ($share_image) {
            $image_name = $CategoryID . '_share_.' . $share_image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($share_image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['share_image']='public/uploads/category/'.$image_name;
        }

        DB::table('category')->where('category_id','=',$CategoryID)->update($row_data);

        if ($CategoryID) {
            return redirect('admin/categories')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/categories')
                ->with('error', 'No successfully.');
        }
    }

     
    public function edit($id)
    {
       

        $data['category']=DB::table('category')->where('category_id',$id)->first();
        $data['main'] = 'Users';
        $data['active'] = 'Update user';
        $data['title'] = 'Update User Registration Form';
        $data['categories']=DB::table('category')->orderBy('category_title','ASC')->get();
        return view('admin.category.edit', $data);
    }

     
    public function update(Request $request, $id)
    {
        $data['category_title']=$request->category_title;
        $data['category_name']=$request->category_name;
        $data['parent_id']=$request->parent_id;
        $data['rank_order']=$request->rank_order;
        $data['status']=$request->status;
        $data['seo_title']=$request->seo_title;
        $data['seo_meta_title']=$request->seo_meta_title;
        $data['seo_keywords']=$request->seo_keywords;
        $data['seo_content']=$request->seo_content;
        $data['seo_meta_content']=$request->seo_meta_content;

        $data['registered_date']=date('Y-m-d');

        $image = $request->file('featured_image');
        $share_image = $request->file('share_image');
        $category_icon = $request->file('category_icon');
        if ($image) {
            $image_name = $id.time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $data['medium_banner']=$image_name;

        }
        if ($category_icon) {
            $image_name = $id.time() . '.' . $category_icon->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($category_icon->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $data['category_icon']=$image_name;

        }

        if ($share_image) {

            $image_name = $id.time() . '.' . $share_image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/category');

            $resize_image = Image::make($share_image->getRealPath());

            $resize_image->save($destinationPath . '/' . $image_name);
            $data['share_image']='public/uploads/category/'.$image_name;


        }

        $result= DB::table('category')->where('category_id',$id)->update($data);
        if ($result) {
            return redirect('admin/categories')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/categories')
                ->with('error', 'No successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
       

        $result=DB::table('category')->where('category_id',$id)->delete();
        if ($result) {
            return redirect('admin/categories')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/categories')
                ->with('error', 'No successfully.');
        }

    } 
    public  function  urlCheck(Request $request){
        $category_name = $request->get('url');
      $result= DB::table('category')->where('category_name',$category_name)->first();
        if($result){
            echo 'This category exit';
        } else {
            echo '';
        }


    }


}
