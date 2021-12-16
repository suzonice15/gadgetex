<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  Session;
use Image;
 use URL;
class TestmonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Testmonial';
        $data['active'] = 'All Testmonial';
        $data['title'] = '  ';
        $data['site_title'] = ' All Testmonial ';
        $data['testmonial']= DB::table('testmonial')->orderBy('id', 'desc')->paginate(10);
        return view('admin.testmonial.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/testmonial/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['user_name']=$request->user_name;
        $data['description']=$request->description;
        $data['create_date']=date("Y-m-d");
        $image = $request->file('image');
        $testmonialid =DB::table('testmonial')->insertGetId($data);
        if ($image) {
            $image_name =$testmonialid . '_banner_.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/users');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->save($destinationPath . '/' . $image_name);
            $row_data['image']='uploads/users/'.$image_name;
            DB::table('testmonial')->where('id','=',$testmonialid)->update($row_data);
        }
        if ($testmonialid) {
            return redirect('admin/testmonial')
                    ->with('success', 'created successfully.');
        } else {
            return redirect('admin/testmonial')
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
        //
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
        $result=DB::table('testmonial')->where('id',$id)->delete();
        if ($result) {
            return redirect('admin/testmonial')
                    ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/testmonial')
                    ->with('error', 'No successfully.');
        }
    }
}
