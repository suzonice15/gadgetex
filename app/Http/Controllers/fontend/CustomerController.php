<?php

namespace App\Http\Controllers\fontend;

use Illuminate\Http\Request;
use DB;
use  Cart;
use Session;
use AdminHelper;
use URL;
use File;
use Image;
use Illuminate\Support\Facades\Cookie;



class CustomerController extends Controller
{

    public  function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");     //Country which we are selecting.
    }


    public function sign_up_form()
    {
        $get_cookies = Cookie::get('unique_code');
        if ($get_cookies) {
            $result = DB::table('product_hit_count')->select('user_id')->where('unique_number', $get_cookies)->first();
            $set_user_id = $result->user_id;
        } else {
            $set_user_id = 2;
        }
        $data['affiliate_id']=$set_user_id;

        $data['seo_title']=get_option('home_seo_title');
        $data['seo_keywords']=get_option('home_seo_keywords');
        $data['seo_description']=get_option('home_seo_content');

         return view('fontend.customer.sign_up_form',$data);
    }

    public  function login(){

        $customer=Session::get('customer_id');
         if($customer){
            return  redirect('/customer/dasboard');

        }


        $data['seo_title']=get_option('home_seo_title');
        $data['seo_keywords']=get_option('home_seo_keywords');
        $data['seo_description']=get_option('home_seo_content');

        return view('fontend.customer.login_form',$data);
    }
    public function login_check(Request $request)
    {
        $phone = $request->phone;
        $data['seo_title']=get_option('home_seo_title');
        $data['seo_keywords']=get_option('home_seo_keywords');
        $data['seo_description']=get_option('home_seo_content');

        $password = md5($request->password);
        $result = DB::table('users')->where('phone', $phone)->where('password', $password)->first();
        if ($result) {
            $id = $result->id;
            Session::put('customer_id', $id);
            Session::put('name', $result->name);
            Session::put('phone', $result->phone);
            Session::put('email', $result->email);
            Session::put('picture', $result->picture);
            Session::put('address', $result->address);
            return redirect('/customer/dasboard');
        } else {
            $data['error']="Your Email Or Password Invalid Try Again";
            return view('website.customer.login_form', $data);
        }

    }



    public function passwordResetRequest(Request $request,$phone)
    {
        $opt=rand(5541,9874);
        $result='1';
        $text="Your Password Restoration OTP Code is ".$opt."\n SohojBuy.com";

        $customer_phone=  DB::table('users')->where('phone',$phone)->first();
        $text = urlencode($text);
        if($customer_phone){
            $smsresult = file_get_contents("http://66.45.237.70/api.php?username=01911504116&password=N2ZKD5H7&number=$phone&message=$text");

            if($smsresult){
                return response()->json(['otp' => $opt, 'success' => true]);

            } else {
                return response()->json(['message' => "Internal Server Error", 'success' => false]);

            }
        } else {

            return response()->json(['message' => "User Not Registered", 'success' => false]);
        }



        //   echo $phone;
    }


    public function otpRequest(Request $request,$phone)
    {
        $opt=rand(5541,9874);
        $result='1';
        $text="Your OTP Code is ".$opt."\n SohojBuy.com";

        $customer_phone=  DB::table('users')->where('phone',$phone)->first();
        $text = urlencode($text);
        if($customer_phone){
            return response()->json(['message' => "This Phone Number Already used", 'success' => false]);
        }

        $smsresult = file_get_contents("http://66.45.237.70/api.php?username=01911504116&password=N2ZKD5H7&number=$phone&message=$text");
        if($smsresult){
            return response()->json(['otp' => $opt, 'success' => true]);
        } else {
            return response()->json(['message' => "Internal Server Error", 'success' => false]);
        }
     //   echo $phone;
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Full Name is required',
            'phone.required' => 'Phone is required',
            'password.required' => 'Password is required',

        ]);
        $customer_phone=  DB::table('users')->where('phone',$request->phone)->first();
        if($customer_phone){
            return redirect('customer/form')->with('error', 'This Phone number  all ready registered');
        }
        $data['name'] = $request->name;
        $data['gender'] = $request->gender;
        $data['birth_day'] = $request->year.'-'.$request->month.'-'. $request->day;
        $data['phone'] = $request->phone;
        $data['password'] = md5($request->password);
        $existingAffilite=DB::table('users_public')->where('phone','=',$request->phone)->count();
        if($existingAffilite > 0) {
            $data['bonus_blance'] = 0;    
        } else {
            $data['bonus_blance'] = 200;
            UpdateStatisticCommisionData(200);
        }        
         
        $data['affiliate_id'] = $request->affiliate_id;
        $result = DB::table('users')->insertGetId($data);
        if ($result) {
            Session::put('customer_id', $result);
            Session::put('name', $request->name);
            Session::put('phone', $request->phone);
            Session::put('email', $request->email);
            Session::put('address', $request->address);
            return redirect('/customer/dasboard')
                ->with('success', 'Thank you your account created successfully');
        } else {
            return redirect('customer/form')
                ->with('error', 'No successfully.');
        }
    }



    public function dashboard()
    {

        $data['user'] = DB::table('users')->where('id', Session::get('customer_id'))->first();
        $data['product'] = DB::table('product')->where('product_promotion_active', '=', 1)->first();

        $data['page_content']=DB::table('page')
            ->where('page_link','promosion-terms-and-condition')->value('page_content');
             $data['order_count']=DB::table('promotion_offers')->where('customer_id','=',Session::get('customer_id'))->count();
         
//
//print_r( $data['promosioins']);exit();
       
        if($data['user']){
            return view('website.customer.dashboard_money',$data);

        } else {
         return  redirect('/customer/login');
        }
    }



    public function profile(){

        $data['user']=DB::table('users')->where('id',Session::get('customer_id'))->first();
        if($data['user']){
            return view('website.customer.profile',$data);

        } else {
            return  redirect('/customer/login');
        }


    }

    public function changed_password(){
        $customer=Session::get('customer_id');
        if($customer){
            return view('website.customer.changedPassword');

        }


    }


    public function changedPasswordUpdate(Request $request){
        $old_password = md5($request->old_password);
        $data['password'] = md5($request->password);
        $password_check=  DB::table('users')->where('password',$old_password)->first();
        if($password_check){
            if($request->password !=$request->cpassword){
                return redirect()->back()->with('error', 'New Password and Confirm Password does not matched');
            }
            $result = DB::table('users')->where('id',Session::get('customer_id'))->update($data);
            if ($result) {
                return redirect()->back()
                    ->with('success', 'Password Updated Successfully');
            }
        } else{
            return redirect()->back()->with('error', 'Your Old Password is invalid');
           }
    }





    public function orders(){
        $customer=Session::get('customer_id');
        if($customer) {
            $data['orders'] = DB::table('order_data')->where('customer_id', Session::get('customer_id'))
                ->orderBy('order_id','desc')
                ->get();
            return view('website.customer.orders', $data);
        } else{
            return redirect('/');
        }
    }
    
    public function orderCancel($order_id){
        $customer=Session::get('customer_id');
        if($customer) {
            $data['order_status']="cancled";
             DB::table('order_data')->where('order_id', $order_id)->update($data);
            return redirect()->back();


        } else{
            return redirect('/');
        }
    }
    public function orderPay($order_id){
        $customer=Session::get('customer_id');
        if($customer) {

            $data['order']= DB::table('order_data')->where('order_id', $order_id)->first();
            $data['user']= DB::table('users')->where('id', $customer)->first();
            return view('website.customer.orderPay', $data);



        } else{
            return redirect('/');
        }
    }

    public function orderPayment(Request $request){
        $customer=Session::get('customer_id');
        if($customer) {
            $payment= $request->payment;
            $order_id= $request->order_id;
            $total_order= $request->total_order;
            if($payment=='bonus'){
               $userBonus= DB::table('users')->where('id', $customer)->sum('bonus_blance');
                if($userBonus >0){
                    $offer=get_option('bonus');
                    $userCanExpend=(($request->total_order*$offer)/100);
                    if($userCanExpend > $userBonus ){
                        $payBlance=$userBonus;
                    } else {
                        $payBlance=$userCanExpend;
                    }

                    $customerData['bonus_blance']=$userBonus-$payBlance;

                    $total_order_amount=DB::table('order_data')->where('order_id','=',$order_id)->value('order_total');

                    $data['order_total']= $total_order_amount-$payBlance;
                    $data['bonus_balance']= $payBlance;
                    $data['payWith']= "bonus";
                    DB::table('order_data')->where('order_id',$order_id)->update($data);
                    DB::table('users')->where('id',$customer)->update($customerData);
                    $row_data['order_id']=$order_id;
                    $row_data['amount']=$payBlance;
                    $row_data['user_id']=$customer;
                    $row_data['created_at']=date("Y-m-d");
                    $row_data['status']=$payment;
                    DB::table('user_bonus_history')->insert($row_data);
                    return redirect()->back()->with('success','Payment Successfully');

                } else {

                    return redirect()->back()->with('error','Insufficient Balance');

                }

            }


        } else{
            return redirect('/');
        }
    }

    public function orderPayByMethod(Request $request){
        $customer=Session::get('customer_id');
        if($customer) {
            $payment= $request->payment_method;
            $order_id= $request->order_id;
            $total_order= $request->total_order;
            $advabced_price= $request->advabced_price;
            $transaction_id= $request->transaction_id;
            if($payment=='bkash'){
                $userBonus= DB::table('users')->where('id', $customer)->sum('bonus_blance');
               $order= DB::table('order_data')->where('order_id',$order_id)->first();

                    $data['order_total']= $total_order-$advabced_price;
                    $data['advabced_price']= $order->advabced_price+$advabced_price;
                    $data['transaction_id']= $transaction_id;
                    $data['payment_method']= $payment;
                    DB::table('order_data')->where('order_id',$order_id)->update($data);

                    $row_data['order_id']=$order_id;
                    $row_data['amount']=$advabced_price;
                    $row_data['user_id']=$customer;
                    $row_data['created_at']=date("Y-m-d");
                    $row_data['status']=$payment;
                    DB::table('user_bonus_history')->insert($row_data);
                    return redirect()->back()->with('success','Payment Successfully'); 
            }


        } else{
            return redirect('/');
        }
    }





    public function profile_update(Request $request){
       $data['name']= $request->name;
       $data['email']= $request->email;
//       $data['phone']= $request->phone;
       $data['address']= $request->address;

        $image = $request->file('user_picture');
        if ($image) {

            $image_name ="user". time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/users');

            $resize_image = Image::make($image->getRealPath());

            $resize_image->resize(200, 200, function ($constraint) {

            })->save($destinationPath . '/' . $image_name);


            $data['picture'] = $image_name;
            Session::put('picture',$image_name);
        }



        $result = DB::table('users')->where('id',Session::get('customer_id'))->update($data);
        return redirect()->back()->with('success','Updated successfully');
    }




    public function logout()

    {
        Session::flush();
        Session::put('customer_id', '');
        $url = URL::current();
        return redirect('/customer/login')->with('success', 'You are successfully Logout !')->with('current', $url);;
    }

    public function ForgotPassword(){
        $customer=Session::get('customer_id');
        if($customer) {
            return redirect('/customer/dasboard');
        }
        return view('fontend.customer.forget_password_form');
    }
    public function forgotPasswordUpdateByPhone(Request $request){
        $result = DB::table('users')->where('phone', $request->phone)->first();
        if ($result) {
            $data['password']=md5($request->password);

            DB::table('users')->where('phone',$request->phone)->update($data);
             
              return redirect('/customer/login')->with('success',"Your Password Changed Successfully");
            } else {
              return redirect()->back()->with('error',"User Not Found");
              }
    }

    public function NewPassword($email){
        Session::put('email',$email);
         $result = DB::table('users')->where('email', $email)->first();
         if ($result) { 
         $data['error']='';
          return view('website.customer.new_password_form',$data);
            } else {
        $data['error']='This Email Not Found';
              return view('website.customer.new_password_form',$data);
            }
    }
    public function NewPasswordStore(Request $request){
        $email=Session::get('email');
         $result = DB::table('users')->where('email', $email)->first();
                if ($result) { 
                    if($request->new_password==$request->retype_new_password){

          $password = md5($request->new_password);
                $data['password'] = $password;
                DB::table('users')->where('id',$result->id)->update($data);
         return redirect('/customer/login')->with('success',"Your Password has been changed");
          } else {
            return redirect()->back()->with('error',"New Password and Retype Password does not matched");
        }
        } else {
        $data['error']='This Email Not Found';
          return redirect()->back()->with('error',"Email Not Found In Our Database");
        }
    }

     


}
