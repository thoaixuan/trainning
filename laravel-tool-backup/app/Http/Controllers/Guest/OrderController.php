<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use App\Orders;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        SEOMeta::setTitle("Đặt hàng");
        OpenGraph::addProperty('locale','vi_VN');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('title', "Đặt hàng");
        TwitterCard::addValue("title", "Đặt hàng");
        JsonLd::setTitle("Đặt hàng");
        JsonLdMulti::setType('Article');
        return view('guest.pages.order.order');
    }
    // Gửi hóa đơn
    public function sendBills(Request $request)
    {
        $message=[
            'full_name.required'=>"Tên không được để trống",
            'full_name.min:3'=>"Tên tối thiểu 3 ký tự",
            'full_name.max:20'=>"Tên không quá 20 ký tự",
            'email.required'=>"Email không được để trống",
            'email.min:8'=>"Email tối thiểu 8 ký tự",
            'email.max:40'=>"Email không được quá 40 ký tự",
            'email.email'=>"Nhập đúng định dạng email",
        ];
        $validate=Validator::make($request->all(),[
            'full_name'=>['required','min:3','max:20'],
            'email'=>['required','min:8','max:40','email'],          
            'address'=>['required'],
            'phone_number'=>['required'], 
        ],$message);
        if($validate->fails()){
            return response()->json([
                'status'=>0,
                'message'=>$validate->errors()->first(),
                'code'=>200
            ]);
        }
        $users= User::where('id','=',$request->userID)->first();
        if($users){
            $email = User::where('id','!=',$request->userID)->where('email','=',$request->email)->first();
            $phone = User::where('id','!=',$request->userID)->where('phone_number','=',$request->phone_number)->first();
            if($email){
                return response()->json([
                    'status'=>0,
                    'message'=>"Email đã tồn tại",
                    'code'=>200
                ]);             
            }

            if($phone){
                return response()->json([
                    'status'=>0,
                    'message'=>"Số điện thoại đã tồn tại",
                    'code'=>200
                ]);             
            }

            $users->full_name= $request->full_name;
            $users->phone_number=$request->phone_number;
            $users->email=$request->email;
            $users->address=$request->address;
            $users->save();
        }
        foreach(json_decode(getConfigMail()->config_mail) as $data){
            $data_mail_driver=$data->mail_driver;
            $data_mail_host=$data->mail_host;
            $data_mail_port=$data->mail_port;
            $data_mail_encryption=$data->mail_encryption;
            $data_mail_username=$data->mail_username;
            $data_mail_password=$data->mail_password;
            $data_mail_from_address=$data->mail_from_address;
            $data_mail_from_name=$data->mail_from_name;
            $data_mail_receive=$data->mail_receive;
            $data_mail_from_address=$data->mail_from_address;
        }
        config([
            'mail.default' => $data_mail_driver,
            'mail.mailers.smtp.host' => $data_mail_host,
            'mail.mailers.smtp.port' => $data_mail_port,
            'mail.mailers.smtp.encryption' =>$data_mail_encryption,
            'mail.mailers.smtp.username' => $data_mail_username,
            'mail.mailers.smtp.password' =>$data_mail_password ,
            'mail.from.address' =>$data_mail_from_address,
            'mail.from.name' => $data_mail_from_name
        ]);
        // $title_mail = "Thông tin đơn hàng";
        // $data = array(
        //     "subject" => $title_mail,
        //     "full_name" => $users->full_name,
        //     'phone_number' => $users->phone_number,
        //     'email' => $users->email,
        //     'product'=>$request->order_detail,
        //     "email_to" => $request->email,
        //     "email_to_admin" => $data_mail_receive,
        //     "email_from" => $data_mail_from_address,
        //     'mail.from.name'=>$data_mail_from_name
        // );
        // Mail::send('guest.components.order.mail',
        // ['data' => $data], function ($message) use ($title_mail, $data)
        // {
        //     $message->to($data['email_to_admin'])->subject($title_mail);
        //     $message->to($data['email_to'])->subject($title_mail);
        //     $message->from($data['email_from'],$data['mail.from.name']);
        // });
       

        $orders = new Orders();
        $orders->userID = $request->userID;
        $orders->order_detail = $request->order_detail;
        $orders->total=(int)$request->total;
        $orders->payment=$request->payment;
        $orders->note=$request->note;
        $orders->status=0;
        
        $orders->save();

        if($orders->save()){
	        return response()->json([
                'message' => 'Đặt hàng thành công',
                'status' => 1,
                'data' => $orders,
                'code'=>200,
            ]);
	    }else{
	        return response()->json([
                'message' => 'Đặt hàng thất bại',
                'code' => 500,
                'data' => $orders,
                'status'=>0,
            ]);
	    }
      

    }
    // Lấy danh sách đơn hàng
    public function indexListOrder(){
        return view('guest.pages.order.list');
    }
    // Đổ dữ liệu datatables
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
            ->where('tbl_users.id','=',Auth::user()->id)
            ->orderBy($order,$dir)->get();

        $json_data=array(
            "recordsTotal"=>intval($totalData),
            "recordsFiltered"=>intval($totalFiltered),
            "data"=>$Orders,
        );
        echo json_encode($json_data);
    }

    // Xem thông tin chi tiết
    public function getDetail(request $request){
        $Orders = Orders::where('id','=',$request->id)->first();
        return response()->json([
            'status'=>1,
            'message'=>"Get Data Successfully",
            'code'=>200,
            'data'=>$Orders
        ]);
    }
}
