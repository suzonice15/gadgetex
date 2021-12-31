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

class OfferController extends Controller
{


    public  function __construct()
    {

    }

    public function index()
    {

        $data['main'] = 'Offers';
        $data['active'] = 'All Offers';
        $data['title'] = '  ';
        $data['offers']= DB::table('offers')->orderBy('id', 'desc')->get();
        return view('admin.offer.index',$data);
    }

    public  function  fetch_data(Request $request){
        if($request->ajax())
        {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $categories = DB::table('category')
                ->orWhere('category_title', 'like', '%'.$query.'%')->paginate(10);
            return view('admin.offer.pagination', compact('categories'));
        }

    }


    public function create()
    {


        $data['main'] = 'Offers';
        $data['active'] = 'All Offers';
        $data['title'] = '  ';
      
        return view('admin.offer.create', $data);

    }


    public function store(Request $request)
    {
        $data['name']=$request->name;
        $data['start_date']=date("Y-m-d",strtotime($request->start_date));
        $data['ending_date']=date("Y-m-d",strtotime($request->ending_date));
        $data['order_by']=$request->order_by;
        $data['status']=$request->status;
        $data['description']=$request->description;
        $data['link']=$request->link;
        $data['created_at']=date("Y-m-d");

        $image = $request->file('picture');
        $banner_picture = $request->file('banner');
        $offer_id =DB::table('offers')->insertGetId($data);

        if ($image) {
            $image_name =$offer_id . '_offer_picture_.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['picture']='uploads/category/'.$image_name;
        }
        if ($banner_picture) {
            $image_name = $offer_id . '_offer_banner_.' . $banner_picture->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($banner_picture->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['banner']='uploads/category/'.$image_name;
        }

        DB::table('offers')->where('id','=',$offer_id)->update($row_data);

        if ($offer_id) {
            return redirect('admin/offer')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/offer')
                ->with('error', 'No successfully.');
        }
    }


    public function edit($id)
    {
        $data['offer']=DB::table('offers')->where('id',$id)->first();
        $data['main'] = 'Offers';
        $data['active'] = 'Update Offers';
        $data['title'] = 'Update User Offers Form';
         return view('admin.offer.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $data['name']=$request->name;
        $data['start_date']=date("Y-m-d",strtotime($request->start_date));
        $data['ending_date']=date("Y-m-d",strtotime($request->ending_date));
        $data['order_by']=$request->order_by;
        $data['status']=$request->status;
        $data['description']=$request->description;
        $data['link']=$request->link;
        $image = $request->file('picture');
        $banner_picture = $request->file('banner');
        if ($image) {
            $image_name =$id . '_offer_picture_.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $data['picture']='uploads/category/'.$image_name;
        }
        if ($banner_picture) {
            $image_name = $id . '_offer_banner_.' . $banner_picture->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $resize_image = Image::make($banner_picture->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $data['banner']='uploads/category/'.$image_name;
        }

        $result=DB::table('offers')->where('id','=',$id)->update($data);
        if ($result) {
            return redirect('admin/offer')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/offer')
                ->with('error', 'No successfully.');
        }
    }


    public function delete($id)
    {


        $result=DB::table('offers')->where('id',$id)->delete();
        if ($result) {
            return redirect('admin/offer')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/offer')
                ->with('error', 'No successfully.');
        }

    }

}
