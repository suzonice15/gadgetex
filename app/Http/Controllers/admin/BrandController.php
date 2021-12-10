<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  Session;
use Image;
 use URL;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{


    public  function __construct()
    {

    }

    public function index()
    {

        $data['main'] = 'Brands';
        $data['active'] = 'All Brands';
        $data['title'] = '  ';
        $data['site_title'] = ' All Brands ';
        $data['bands']= DB::table('bands')->orderBy('brand_id', 'desc')->paginate(10);
        return view('admin.brand.index',$data);
    }



    public function create()
    {
       $data['main'] = 'Brands';
        $data['active'] = 'All Brands';
        $data['title'] = '  ';
        $data['site_title'] = ' Brands Create';
        return view('admin.brand.create', $data);
    }


    public function store(Request $request)
    {
        $data['brand_name']=$request->brand_name;
        $data['brand_link']=$request->brand_link;
        $data['brand_seo_title']=$request->brand_seo_title;
        $data['brand_seo_keyword']=$request->brand_seo_keyword;
        $data['brand_seo_content']=$request->brand_seo_content;
        $data['created_at']=date("Y-m-d");
        $image = $request->file('brand_banner');
        $brandID =DB::table('bands')->insertGetId($data);
        if ($image) {
            $image_name =$brandID . '_banner_.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/brand');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['brand_banner']=$image_name;
            DB::table('bands')->where('brand_id','=',$brandID)->update($row_data);
        }


        if ($brandID) {
            return redirect('admin/brand')
                    ->with('success', 'created successfully.');
        } else {
            return redirect('admin/brand')
                    ->with('error', 'No successfully.');
        }
    }


    public function edit($id)
    {
        $data['band']=DB::table('bands')->where('brand_id',$id)->first();
        $data['main'] = 'Brands';
        $data['active'] = 'Update Brands';
        $data['title'] = 'Update Brands Registration Form';
        $data['site_title'] = ' Brands Brands';
         return view('admin.brand.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $data['brand_name']=$request->brand_name;
        $data['brand_link']=$request->brand_link;
        $data['brand_seo_title']=$request->brand_seo_title;
        $data['brand_seo_keyword']=$request->brand_seo_keyword;
        $data['brand_seo_content']=$request->brand_seo_content;

        $image = $request->file('brand_banner');
        if ($image) {
            $image_name = $id.time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/brand');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $data['brand_banner']=$image_name;
        }

        $result= DB::table('bands')->where('brand_id',$id)->update($data);
        if ($result) {
            return redirect('admin/brand')
                    ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/brand')
                    ->with('error', 'No successfully.');
        }
    }

    public function delete($id)
    {
        $result=DB::table('bands')->where('brand_id',$id)->delete();
        if ($result) {
            return redirect('admin/brand')
                    ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/brand')
                    ->with('error', 'No successfully.');
        }
    }
}
