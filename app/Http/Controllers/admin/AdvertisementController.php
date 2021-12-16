<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  Session;
use Image;
 use URL;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Advertisement';
        $data['active'] = 'All Advertisement';
        $data['title'] = '  ';
        $data['site_title'] = ' All Advertisement ';
        $data['advertisement']= DB::table('advertisement')->orderBy('id', 'desc')->paginate(10);
        return view('admin.advertisement.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/advertisement/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['title']=$request->title;
        $data['link']=$request->link;
        $data['create_date']=date("Y-m-d");
        $data['order_by']=$request->order_by;
        $image = $request->file('image');
        $advertisementid =DB::table('advertisement')->insertGetId($data);
        if ($image) {
            $image_name =$advertisementid . '_banner_.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/advertisement');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['image']='uploads/advertisement/'.$image_name;
            DB::table('advertisement')->where('id','=',$advertisementid)->update($row_data);
        }
        if ($advertisementid) {
            return redirect('admin/advertisement')
                    ->with('success', 'created successfully.');
        } else {
            return redirect('admin/advertisement')
                    ->with('error', 'No successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['advertisement']=DB::table('advertisement')->where('id',$id)->first();
        $data['main'] = 'Advertisement';
        $data['active'] = 'Update Advertisement';
        $data['title'] = 'Update Advertisement Registration Form';
         return view('admin.advertisement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result=DB::table('advertisement')->where('id',$id)->delete();
        if ($result) {
            return redirect('admin/advertisement')
                    ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/advertisement')
                    ->with('error', 'No successfully.');
        }
    }
}
