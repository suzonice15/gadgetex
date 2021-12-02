<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  Session;
use Image;
use AdminHelper;
use URL;
use Webp;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function __construct()
    {
       
        date_default_timezone_set('Asia/Dhaka');

    }

    public function index()
    {

        $data['main'] = 'Orders';
        $data['active'] = 'All Orders';
        $data['title'] = '  ';
        $data['order_status'] = 'new';
        $orders = DB::table('order_data')->where('order_status', 'new')->orderBy('order_id', 'desc')->paginate(10);
        return view('admin.order.index', compact('orders'), $data);
    }

    public function pagination(Request $request)
    {
        if ($request->ajax()) {
            $status = $request->get('status');
            $orders = DB::table('order_data')->where('order_status', $status)->orderBy('order_id', 'desc')
                ->paginate(10);
            return view('admin.order.pagination', compact('orders'));
        }
    }

    public function pagination_by_search(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $orders = DB::table('order_data')->orWhere('order_id', 'LIKE', '%' . $query . '%')
                ->orderBy('order_id', 'desc')
                ->paginate(10);
            return view('admin.order.pagination', compact('orders'));
        }

    }



    public function orderConvertToProductCode( )
    {


            $orders = DB::table('order_data')
                ->select('products','order_id','order_date')
                ->where('order_status','=','completed')
                ->orWhere('order_status','=','delivered')
                ->get();
        foreach($orders as $key=>$order) {
            $data ['order_id'] = $order->order_id;
            $data ['date'] = $order->order_date;
            $order_items = unserialize($order->products);
            if (is_array($order_items['items'])) {
                foreach ($order_items['items'] as $product_id => $item) {
                    $products_sku = DB::table('product')->select('sku')->where('product_id', '=', $product_id)->first();
                    if($products_sku){
                        $data ['product_code'] = $products_sku->sku;
                        DB::table('product_of_order_data')->insert($data);
                    }
                }
            }
        }



    }

    public function pagination_search_by_phone(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $orders = DB::table('order_data')
                ->where('customer_phone', 'LIKE', '%' . $query . '%')
                ->orderBy('order_id', 'desc')
                ->paginate(500);
            return view('admin.order.pagination', compact('orders'));
        }

    }
    public function pagination_search_by_product_code(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $orders = DB::table('order_data')
                ->join('product_of_order_data','product_of_order_data.order_id','=','order_data.order_id')
                ->where('product_code',$query )
                ->orderBy('order_data.order_id', 'desc')
                ->paginate(100);
            return view('admin.order.pagination', compact('orders'));
        }

    }


    public function pagination_search_by_affiliate_id(Request $request)
    {

        if ($request->ajax()) {
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $orders = DB::table('order_data')
                ->where('user_id', '=', $query)
                ->orderBy('order_id', 'desc')
                ->paginate(500);
            return view('admin.order.pagination', compact('orders'));
        }

    }



    public function pagination_by_status(Request $request)
    {
        if ($request->ajax()) {


            $status = $request->get('status');
            $orders = DB::table('order_data')->where('order_status', $status)->orderBy('order_id', 'desc')
                ->paginate(10);
            return view('admin.order.pagination', compact('orders'));
        }

    }


    public function create()
    {

        $status = Session::get('status');
        if ($status == 'super-admin' || $status == 'office-staff' || $status == 'editor') {
            $data['main'] = 'Orders';
            $data['active'] = 'All orders';
            $data['title'] = '  ';
            $data['order'] = DB::table('order_data')->where('order_id', 268)->first();
            $data['couriers'] = DB::table('courier')->get();
            $data['products'] = DB::table('product')->select('product_id', 'product_title', 'sku')->orderby('product_id', 'desc')->get();


            return view('admin.order.create', $data);
        } else {
            return redirect()->back();
        }


    }

    public function store(Request $request)
    {
        $data['order_status'] = $request->order_status;
        $order_status = $request->order_status;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['created_time'] = date("Y-m-d H:i:s");
        $data['created_by'] = Session::get('name');
        $data['modified_time'] = date("Y-m-d H:i:s");
        $data['order_date'] = date("Y-m-d");
        $data['order_total'] = $request->order_total;
        $data['products'] = serialize($request->products);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['courier_service'] = $request->courier_service;
        $data['order_from'] = "sohojbuy.com";
        $data['staff_id'] = Session::get('id');
        //$data['delevery_address'] = $request->delevery;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['discount_price'] = $request->discount_price;
        $data['advabced_price'] = $request->advabced_price;
        $data['order_note'] = $request->order_note;

        if ($order_status == 'delivered') {

        }


        if ($request->shipment_time) {

            $data['shipment_time'] = date('Y-m-d H:i:s', strtotime($request->shipment_time));
        }


        $order_data = DB::table('order_data')->insertGetId($data);
        /// order edit track
        $order_track['status'] = "order From ".Session::get('name').$order_status;
        $order_track['user_id'] = Session::get('id');
        $order_track['order_id'] = $order_data;
        $order_track['updated_date'] = date('Y-m-d H:i:s');
        $order_track['user_name'] = Session::get('name');
        $order_track['order_note'] = $request->order_note;
        DB::table('order_edit_track')->insert($order_track);


        if ($order_data) {


            return redirect('admin/orders')->with('success', 'Created successfully.');
        } else {

            return redirect('admin/orders/')->with('error', 'Error to Create this order');
        }


    }


    public function edit($id)
    {

        $data['main'] = 'Orders';
        $data['active'] = 'Update Orders';
        $data['title'] = 'Update Orders Data';
        $data['order'] = DB::table('order_data')->where('order_id', $id)->first();


        $data['couriers'] = DB::table('courier')->where('active','=',1)->get();
        $data['products'] = DB::table('product')->select('product_id', 'product_title', 'sku')->orderby('product_id', 'desc')->get();


        return view('admin.order.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

/* product stock variation */
        $order_details = DB::table('order_data')->select('products','order_date')->where('order_id', $id)->first();
        $order_items = unserialize($order_details->products);
       $stock_check_product= serialize($request->products);
        if (is_array($order_items['items'])) {
            foreach ($order_items['items'] as $product_id => $item) {
                  $form_products=unserialize($stock_check_product);
                foreach ($form_products['items'] as $product_id_form => $item_from) {

                    if($product_id_form ==$product_id){

                        if($item_from['qty'] >= $item['qty']){
                            $product_stock = DB::table('product')->select('product_stock')
                                ->where('product_id', $product_id)->first();
                            if ($product_stock) {
                                $stock['product_stock'] = $product_stock->product_stock -($item_from['qty']-$item['qty']);
                                $product_stock = DB::table('product')->where('product_id', $product_id)->update($stock);
                            }
                        } else{
                            $product_stock = DB::table('product')->select('product_stock')
                                ->where('product_id', $product_id)->first();
                            if ($product_stock) {
                                $stock['product_stock'] = $product_stock->product_stock +($item['qty']-$item_from['qty']);
                                $product_stock = DB::table('product')->where('product_id', $product_id)->update($stock);
                            }

                        }


                    }

                }

            }
        }



        $order_number = $id;
        $statusInfoCheck = $request->order_status;
        //vendor amount add..
        if ($statusInfoCheck =='delivered') {

                $product_of_order_data ['order_id'] = $id;
                 $product_of_order_data ['date'] = $order_details->order_date;
                $order_items = unserialize($order_details->products);
                if (is_array($order_items['items'])) {
                    foreach ($order_items['items'] as $product_id => $item) {
                        $products_sku = DB::table('product')->select('sku')->where('product_id', '=', $product_id)->first();
                        if ($products_sku) {
                            $product_of_order_data ['product_code'] = $products_sku->sku;
                            DB::table('product_of_order_data')->insert($product_of_order_data);
                        }
                    }
                }

        }
 
        if ($statusInfoCheck == 'completed') {
            $cashBackInfo = DB::table('order_data')
                ->where('order_id', $order_number)
                ->first();
            $info = DB::table('users_public')
                ->where('id', $cashBackInfo->order_from_affilite_id)
                ->first();
            if ($info) {
                $preCash = $info->cash_back;
                $presentCash = ($preCash + $cashBackInfo->cash_back);
                $data_customer['cash_back'] = $presentCash;
                $updateInfo = DB::table('users_public')
                    ->where('id', $cashBackInfo->order_from_affilite_id)
                    ->update($data_customer);
                }
  
        }
        $data['order_status'] = $request->order_status;
        $order_status = $request->order_status;
        $data['shipping_charge'] = $request->shipping_charge;
        $data['discount_price'] = $request->discount_price;
        $data['advabced_price'] = $request->advabced_price;
        $data['modified_time'] = date("Y-m-d H:i:s");
        $data['order_total'] = $request->order_total;
        $data['products'] = serialize($request->products);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_address'] = $request->customer_address;
        $data['courier_service'] = $request->courier_service;
        $data['changed_affilite_commision'] = $request->totalCommision;
        $data['order_note'] = $request->order_note;

        $data['staff_id'] = Session::get('id'); 
        /// order edit track
        $order_track['status'] = $order_status;
        $order_track['user_id'] = Session::get('id');
        $order_track['order_id'] = $order_number;
        $order_track['updated_date'] = date('Y-m-d H:i:s');
        $order_track['user_name'] = Session::get('name');
        $order_track['order_note'] = $request->order_note;
        DB::table('order_edit_track')->insert($order_track);
        if ($request->shipment_time) {
            $data['shipment_time'] = date('Y-m-d H:i:s', strtotime($request->shipment_time));
        }
        $order_data = DB::table('order_data')->where('order_id', $order_number)->update($data);
        /// Commision calcution
        if ($order_status == 'completed') {
            // top product sell
            $BackBonasInfo = DB::table('order_data')
                ->where('order_id', $order_number)
                ->first();
            /* statistics data */
            $statistics=DB::table('statistics')->first();
            $statistics_data['total_sell_amounts']= $statistics->total_sell_amounts+$BackBonasInfo->order_total;
            $statistics_data['total_sell_count']= $statistics->total_sell_count+1;
            DB::table('statistics')->where('id','=',1)->update($statistics_data);
            // contest commision fund
            if($BackBonasInfo->user_id > 0){
                $today_date=date("Y-m-d");
                $contest_first_date= get_option_of_affilite('contest_first_date');
                $contest_last_date= get_option_of_affilite('contest_last_date');
                if($BackBonasInfo->order_date >=  $contest_first_date  && $BackBonasInfo->order_date <= $contest_last_date){
                    $contest_fund= DB::table('contest_fund')->first();
                    $contest_fund_data['amount']=$contest_fund->amount+20;
                    DB::table('contest_fund')->update($contest_fund_data);
                    $contest_fund_history['user_id']=$BackBonasInfo->user_id;
                    $contest_fund_history['amount']=20;
                    $contest_fund_history['order_id']=$order_number;
                    $contest_fund_history['created_at']=date("Y-m-d");
                    DB::table('contest_fund_history')->insert($contest_fund_history);
                }
            }
            $info = DB::table('users_public')
                ->where('id', $BackBonasInfo->user_id)
                ->first();
            if ($info) {
                $mainWithdrawh = $info->withdraw_balance;
                $finalWithdraw = ($mainWithdrawh + $BackBonasInfo->bonus_balance);
                $bonashdata_customer['withdraw_balance'] = $finalWithdraw;
                $bonashdata_customer['status'] = 1;
                $updateInfo = DB::table('users_public')
                    ->where('id', $BackBonasInfo->user_id)
                    ->update($bonashdata_customer);
                
                UpdateStatisticCommisionData($BackBonasInfo->bonus_balance);
            }
           $order_details = DB::table('order_data')->select('products')->where('order_id', $order_number)->first();
                $order_items = unserialize($order_details->products);
                if (is_array($order_items['items'])) {
                    foreach ($order_items['items'] as $product_id => $item) {
                            $top_product_sell['quantity'] =$item['qty'];
                            $top_product_sell['product_id'] =$product_id;
                            $top_product_sell['order_id'] =$order_number;
                            $top_product_sell['order_id'] =$order_number;
                            $top_product_sell['sell_price'] =$item['price'];
                            DB::table('top_product_sell')->insert($top_product_sell);
                    }
                }


            $affiliate_id=DB::table('order_data')
                ->select('user_id','order_from_affilite_id')
                ->where('order_id',$order_number)->first();
            if($affiliate_id->user_id >0){
                 $loopCount =count($request->commion_product_id);
                for($i=0;$i<$loopCount;$i++){
                    $commision_data['order_id']=$order_number;
                    $commision_data['product_id']=$request->commion_product_id[$i];
                    $commision_data['comission']=$request->commision[$i];
                    $commision_data['affilate_id']=$affiliate_id->user_id;
                    $commision_data['date']=date('Y-m-d');
                    DB::table('product_permission_report')->insert($commision_data);
                }
            }
        }

        if ($order_status == 'cancled') {
            $BackBonasInfo = DB::table('order_data')
                ->where('order_id', $order_number)
                ->first();
            $info = DB::table('users_public')
                ->where('id', $BackBonasInfo->user_id)
                ->first();
            if ($info) {
                DB::table('withdraw_history')
                     ->where('order_id', $order_number)
                     ->delete();
                $preCash = $info->bonus_balance;
                $presentCash = ($preCash + $BackBonasInfo->bonus_balance);
                $bonashdata_customer['bonus_balance'] = $presentCash;
                $updateInfo = DB::table('users_public')
                    ->where('id', $BackBonasInfo->user_id)
                    ->update($bonashdata_customer);
                $data_orderback_bonas['bonus_balance']=0;
                $BackBonasInfo = DB::table('order_data')
                    ->where('order_id', $order_number)
                    ->update($data_orderback_bonas);
                }
        }


        if ($order_data) {
/// stock add
            if ($order_status == 'cancled') {
                $order_details = DB::table('order_data')->where('order_id', $order_number)->first();
                $order_items = unserialize($order_details->products);
                if (is_array($order_items['items'])) {
                    foreach ($order_items['items'] as $product_id => $item) {
                        $product_stock = DB::table('product')->select('product_stock')->where('product_id', $product_id)->first();
                        if ($product_stock) {
                            $stock['product_stock'] = $product_stock->product_stock + $item['qty'];
                            $product_stock = DB::table('product')->where('product_id', $product_id)->update($stock);
                        }
                    }
                }
            }
            return redirect('admin/orders')
                ->with('success', 'Updated successfully.');
        } else {

            return redirect('admin/order/' . $order_number)
                ->with('success', 'Error to update this order');
        }


    }

    function orderHistoryGenerate()
    {
        $order_details = DB::table('order_data')->where('order_status', '=','completed')->get();

        foreach ($order_details as $order) {


            $order_id = $order->order_id;
            $order_items = unserialize($order->products);
            if (is_array($order_items['items'])) {

                foreach ($order_items['items'] as $product_id => $item) {

                    $single_product =DB::table('product')
                        ->select('product_order_count')
                        ->where('product_id', $product_id)->first();
                    if($single_product){
                    $priviousOrderCount['product_order_count'] = $single_product->product_order_count + $item['qty'];
                    DB::table('product')->where('product_id', $product_id)->update($priviousOrderCount);
                    $order_history_count['product_id'] = $product_id;
                    $order_history_count['order_count'] = $item['qty'];
                    $order_history_count['order_id'] = $order_id;
                    $order_history_count['created_at'] = date("Y-m-d");
                    DB::table('product_order_history')->insert($order_history_count);
                    }

                }
            }
        }

      }


    public function courierViewReport()
    {
        $data['main'] = ' Courier';
        $data['active'] = 'All Courier';
        $data['title'] = '  ';
        $data['order_status'] = 'new';
        $data['couriers'] = DB::table('courier')->get();
        $data['orders_total'] = DB::table('order_data')->select('courier_service')
            ->where('courier_service', '>', 0)
            ->count();
        $data['orders_total_refund'] = DB::table('order_data')->select('courier_service')
            ->where('courier_service', '>', 0)
            ->where('order_status', '=', 'refund')
            ->count();
        $data['orders_total_oncurrier'] = DB::table('order_data')->select('courier_service')
            ->where('courier_service', '>', 0)
            ->where('order_status', '=', 'on_courier')
            ->count();
        $data['orders_total_completed'] = DB::table('order_data')->select('courier_service')
            ->where('courier_service', '>', 0)
            ->where('order_status', '=', 'completed')
            ->count();
        $data['orders_total_sum'] = DB::table('order_data')->select('order_total')
            ->where('courier_service', '>', 0)
            ->sum('order_total');
        $data['orders_total_refund_sum'] = DB::table('order_data')->select('order_total')
            ->where('courier_service', '>', 0)
            ->where('order_status', '=', 'refund')
            ->sum('order_total');
        $data['orders_total_on_courier_sum'] = DB::table('order_data')->select('order_total')
            ->where('courier_service', '>', 0)
            ->where('order_status', '=', 'on_courier')
            ->sum('order_total');
        $data['orders_total_completed_sum'] = DB::table('order_data')->select('order_total')
            ->where('courier_service', '>', 0)
            ->where('order_status', '=', 'completed')
            ->sum('order_total');

        return view('admin.order.courierViewReport', $data);
    }

    public function courierViewReportPagination(Request $request)
    {
        if ($request->ajax()) {


            $courier_id = $request->get('courier_id');
            $data['orders_total'] = DB::table('order_data')->select('courier_service')
                ->where('courier_service', '=', $courier_id)
                ->count();
            $data['orders_total_refund'] = DB::table('order_data')->select('courier_service')
                ->where('courier_service', '=', $courier_id)
                ->where('order_status', '=', 'refund')
                ->count();
            $data['orders_total_oncurrier'] = DB::table('order_data')->select('courier_service')
                ->where('courier_service', '=', $courier_id)
                ->where('order_status', '=', 'on_courier')
                ->count();
            $data['orders_total_completed'] = DB::table('order_data')->select('courier_service')
                ->where('courier_service', '=', $courier_id)
                ->where('order_status', '=', 'completed')
                ->count();
            $data['orders_total_sum'] = DB::table('order_data')->select('order_total')
                ->where('courier_service', '=', $courier_id)
                ->sum('order_total');
            $data['orders_total_refund_sum'] = DB::table('order_data')->select('order_total')
                ->where('courier_service', '=', $courier_id)
                ->where('order_status', '=', 'refund')
                ->sum('order_total');
            $data['orders_total_on_courier_sum'] = DB::table('order_data')->select('order_total')
                ->where('courier_service', '=', $courier_id)
                ->where('order_status', '=', 'on_courier')
                ->sum('order_total');
            $data['orders_total_completed_sum'] = DB::table('order_data')->select('order_total')
                ->where('courier_service', '=', $courier_id)
                ->where('order_status', '=', 'completed')
                ->sum('order_total');
            $orders = DB::table('order_data')
                ->where('courier_service', $courier_id)
                ->orderBy('order_id', 'desc')
                ->paginate(10);
            return view('admin.order.courierViewReportPagination', compact('orders'), $data);
        }
    }

    public function invoicePrint($id)
    {

        $data['order'] = DB::table('order_data')->where('order_id', $id)->first();
        $data['orderData'] = DB::table('order_data as od')
            ->join('courier as c', 'c.courier_id', '=', 'od.courier_service')
            ->where('order_id', $id)
            ->select('c.*')
            ->first();

        return view('admin.order.invoice_view', $data);
    }

    public function orderModalPrint($id)
    {

        $data['order'] = DB::table('order_data')->where('order_id', $id)->first();
        $data['orderData'] = DB::table('order_data as od')
            ->join('courier as c', 'c.courier_id', '=', 'od.courier_service')
            ->where('order_id', $id)
            ->select('c.*')
            ->first();

        return view('admin.order.modal_invoice', $data);
    }

    public function orderEditHistory($id)
    {

        $data['orders'] = DB::table('order_edit_track')
            ->where('order_id', $id)
            ->orderBy('order_edit_track_id', 'desc')
            ->get();
      
        $data['order'] = DB::table('order_data')
            ->select('customer_order_note','affiliate_order_note')
            ->where('order_id', $id)
            ->first();
        return view('admin.order.orderEditHistory', $data);

    }

    public function orderReport()
    {
         $data['years']=date('Y');
           $data['month']=date('m');
         $today=date("Y-m-d");
           $data['new_count']=$this->orderCount('new',$today);
           $data['phone_pending_count']=$this->orderCount('phone_pending',$today);
           $data['pending_payment_count']=$this->orderCount('pending_payment',$today);
           $data['processing_count']=$this->orderCount('processing',$today);
           $data['on_courier_count']=$this->orderCount('on_courier',$today);
           $data['delivered_count']=$this->orderCount('delivered',$today);
           $data['refund_count']=$this->orderCount('refund',$today);
           $data['completed_count']=$this->orderCount('completed',$today);
           $data['cancled_count']=$this->orderCount('cancled',$today);
           $data['new_sum']=$this->orderSum('new',$today);
           $data['phone_pending_sum']=$this->orderSum('phone_pending',$today);
           $data['pending_payment_sum']=$this->orderSum('pending_payment',$today);
           $data['processing_sum']=$this->orderSum('processing',$today);
           $data['on_courier_sum']=$this->orderSum('on_courier',$today);
           $data['delivered_sum']=$this->orderSum('delivered',$today);
           $data['refund_sum']=$this->orderSum('refund',$today);
           $data['completed_sum']=$this->orderSum('completed',$today);
           $data['cancled_sum']=$this->orderSum('cancled',$today);

         return view('admin.order.orderReport', $data);

    }
    public function orderReportGeneration(Request $request)
{


    if($request->day && $request->month){

        $data['years']=date("Y",strtotime($request->month));
        $data['month']=date("m",strtotime($request->month));
        $today=date("Y-m-d",strtotime($request->day));
        $data['new_count']=$this->orderCount('new',$today);
        $data['phone_pending_count']=$this->orderCount('phone_pending',$today);
        $data['pending_payment_count']=$this->orderCount('pending_payment',$today);
        $data['processing_count']=$this->orderCount('processing',$today);
        $data['on_courier_count']=$this->orderCount('on_courier',$today);
        $data['delivered_count']=$this->orderCount('delivered',$today);
        $data['refund_count']=$this->orderCount('refund',$today);
        $data['completed_count']=$this->orderCount('completed',$today);
        $data['cancled_count']=$this->orderCount('cancled',$today);

        $data['new_sum']=$this->orderSum('new',$today);
        $data['phone_pending_sum']=$this->orderSum('phone_pending',$today);
        $data['pending_payment_sum']=$this->orderSum('pending_payment',$today);
        $data['processing_sum']=$this->orderSum('processing',$today);
        $data['on_courier_sum']=$this->orderSum('on_courier',$today);
        $data['delivered_sum']=$this->orderSum('delivered',$today);
        $data['refund_sum']=$this->orderSum('refund',$today);
        $data['completed_sum']=$this->orderSum('completed',$today);
        $data['cancled_sum']=$this->orderSum('cancled',$today);
        return view('admin.order.orderReportView', $data);
    }
    if($request->month){
        $data['years']=date("Y",strtotime($request->month));
        $data['month']=date("m",strtotime($request->month));
        return view('admin.order.orderReportView', $data);
    }
    if($request->day){
        $today=date("Y-m-d",strtotime($request->day));
        $data['new_count']=$this->orderCount('new',$today);
        $data['phone_pending_count']=$this->orderCount('phone_pending',$today);
        $data['pending_payment_count']=$this->orderCount('pending_payment',$today);
        $data['processing_count']=$this->orderCount('processing',$today);
        $data['on_courier_count']=$this->orderCount('on_courier',$today);
        $data['delivered_count']=$this->orderCount('delivered',$today);
        $data['refund_count']=$this->orderCount('refund',$today);
        $data['completed_count']=$this->orderCount('completed',$today);
        $data['cancled_count']=$this->orderCount('cancled',$today);

        $data['new_sum']=$this->orderSum('new',$today);
        $data['phone_pending_sum']=$this->orderSum('phone_pending',$today);
        $data['pending_payment_sum']=$this->orderSum('pending_payment',$today);
        $data['processing_sum']=$this->orderSum('processing',$today);
        $data['on_courier_sum']=$this->orderSum('on_courier',$today);
        $data['delivered_sum']=$this->orderSum('delivered',$today);
        $data['refund_sum']=$this->orderSum('refund',$today);
        $data['completed_sum']=$this->orderSum('completed',$today);
        $data['cancled_sum']=$this->orderSum('cancled',$today);
        return view('admin.order.orderReportView', $data);


    }
}
    public function orderCount($staus,$today)
    {
         $count=DB::table('order_data')->where('order_status','=',$staus)->where('order_date','=',$today)->count();
        return $count;
    }
    public function orderSum($staus,$today)
    {


        $sum=DB::table('order_data')->where('order_status','=',$staus)->where('order_date','=',$today)->sum("order_data.order_total");
        return $sum;
    }

    public function statusChanged($staus,$order_id)
    {
        $order_track['status'] = $staus;
        $order_track['user_id'] = Session::get('id');
        $order_track['order_id'] = $order_id;
        $order_track['updated_date'] = date('Y-m-d H:i:s');
        $order_track['user_name'] = Session::get('name');
        $order_track['order_note'] = '';
        DB::table('order_edit_track')->insert($order_track);


        $data['order_status']=$staus;
        $result=DB::table('order_data')
            ->where('order_id','=',$order_id)
            ->update($data);
        if($result){
            return redirect('admin/orders')
                ->with('success', 'Updated successfully.');
        }
    }


}
