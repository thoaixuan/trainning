<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Orders;
use App\User;
use Mail;
class OrderController extends Controller
{
    public function index(){
        return view('admin.pages.order.order',['title'=>'Order']);
    }
    public function getDatatable(Request $request){
        $columns[]='id';

        $limit=$request->input('length');
        $start=$request->input('start');
        $search=$request->input('search');
        $order=$columns[$request->input('order.0.column')];
        $dir=$request->input('order.0.dir');   
        
        $totalData=Orders::count();
        $totalFiltered=$totalData;

            $Orders=Orders::join('tbl_users','tbl_orders.userID','=','tbl_users.id')
            ->select('tbl_orders.*','tbl_users.full_name')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$Orders,
        );
        echo json_encode($json_data);
    }
    public function getDetail(request $request){
        $Orders = Orders::where('id',$request->id)->first();
        return response()->json([
            'status'=>1,
            'message'=>"Get Data Successfully",
            'code'=>200,
            'data'=>$Orders
        ]);
    }
    public function config_mail(){
        foreach(json_decode(settings()->config_mail) as $list_mail){
            $mail_driver = $list_mail->mail_driver;
            $mail_host = $list_mail->mail_host;
            $mail_port = $list_mail->mail_port;
            $mail_encryption = $list_mail->mail_encryption;
            $mail_username = $list_mail->mail_username;
            $mail_password = $list_mail->mail_password;
            $mail_from_address = $list_mail->mail_from_address;
            $mail_from_name = $list_mail->mail_from_name;

            $mail_receive = $list_mail->mail_receive;
        }
         // Config mail
         config([
            'mail.default' => $mail_driver,
            'mail.mailers.smtp.host' => $mail_host,
            'mail.mailers.smtp.port' => $mail_port,
            'mail.mailers.smtp.encryption' => $mail_encryption,
            'mail.mailers.smtp.username' => $mail_username,
            'mail.mailers.smtp.password' => $mail_password,
            'mail.from.address' => $mail_from_address,
            'mail.from.name' => $mail_from_name
        ]);
    }
    public function changeProcessing(request $request){
        $this->config_mail();
        $Orders = Orders::where('id',$request->id)->first();
        $get_user = User::where('id',$request->userid)->first();
        $title_mail = "Đơn hàng của bạn đang xử lý";
        $data = array(
            "subject" => $title_mail,
            "info" => $Orders->order_detail,
            "email_to" => $get_user->email,
        );
        Mail::send('admin.mails.changeStatus',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email_to'])->subject($title_mail);
        });
        $Orders->status = 0;
        $Orders->save();
        if($Orders->save()){
	        return response()->json([
                'message' => 'Cập nhật thành công',
                'status' => 200,
                'data' => $Orders
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Orders
            ]);
	    }
    }
    public function changeUnpaid(request $request){
        $this->config_mail();
        $Orders = Orders::where('id',$request->id)->first();
        $get_user = User::where('id',$request->userid)->first();
        $title_mail = "Đơn hàng của bạn chưa thanh toán";
        $data = array(
            "subject" => $title_mail,
            "info" => $Orders->order_detail,
            "email_to" => $get_user->email,
        );
        Mail::send('admin.mails.changeStatus',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email_to'])->subject($title_mail);
        });

        $Orders->status = 1;
        $Orders->save();
        if($Orders->save()){
	        return response()->json([
                'message' => 'Cập nhật thành công',
                'status' => 200,
                'data' => $Orders
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Orders
            ]);
	    }
    }
    public function changeCancel(request $request){
        $this->config_mail();
        $Orders = Orders::where('id',$request->id)->first();
        $get_user = User::where('id',$request->userid)->first();
        $title_mail = "Đơn hàng của bạn đã hủy";
        $data = array(
            "subject" => $title_mail,
            "info" => $Orders->order_detail,
            "email_to" => $get_user->email,
        );
        Mail::send('admin.mails.changeStatus',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email_to'])->subject($title_mail);
        });
        $Orders->status = 2;
        $Orders->save();
        if($Orders->save()){
	        return response()->json([
                'message' => 'Cập nhật thành công',
                'status' => 200,
                'data' => $Orders
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Orders
            ]);
	    }
    }
    public function changeCompleted(request $request){
        $this->config_mail();
        $Orders = Orders::where('id',$request->id)->first();
        $get_user = User::where('id',$request->userid)->first();
        $title_mail = "Đơn hàng của bạn đã hoàn tất";
        $data = array(
            "subject" => $title_mail,
            "info" => $Orders->order_detail,
            "email_to" => $get_user->email,
        );
        Mail::send('admin.mails.changeStatus',
        ['data' => $data], function ($message) use ($title_mail, $data)
        {
            $message->to($data['email_to'])->subject($title_mail);
        });
        $Orders->status = 3;
        $Orders->save();
        if($Orders->save()){
	        return response()->json([
                'message' => 'Cập nhật thành công',
                'status' => 200,
                'data' => $Orders
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Orders
            ]);
	    }
    }
    public function changeOther(request $request){
        $Orders = Orders::where('id',$request->id)->first();
        $Orders->status = 4;
        $Orders->save();
        if($Orders->save()){
	        return response()->json([
                'message' => 'Cập nhật thành công',
                'status' => 200,
                'data' => $Orders
            ]);
	    }else{
	        return response()->json([
                'message' => 'Thất bại',
                'status' => 500,
                'data' => $Orders
            ]);
	    }
    }
    public function delete( Request $Request )
    {
        $result = Orders::where('id','=',$Request->id)->first();
        $result->delete();
        return response()->json([
            'message' => 'Đã xóa thành công!',
            'status' => 200,
            'data' => $result
        ]);
    }
}
