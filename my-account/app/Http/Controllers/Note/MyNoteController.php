<?php

namespace App\Http\Controllers\Note;
use App\notes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MyNoteController extends Controller
{
    public function index()
    {
        return view('pages.notes.notes');
    }
    public function getDatatable(Request $Request)
    {
        $columns [] ='id';
        $columns [] ='title';
        $columns [] ='description';
        $columns [] ='status';

        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        // $search = $Request->input('search');
        $totalData =  notes::count();
            $notes = notes::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        $json_data = array(
            "draw"            => intval($Request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data"            => $notes
        );
        echo json_encode($json_data);
    }

    public function create(){
        return response()->json([
            'status'=>1,
            'message'=>"Thành công",
        ]);
    }

    public function createPost(Request $Request)
    {
        $rules = [
            'title' => 'Required',
        ];
        $message = [
            'title.Required' => 'Tiêu đề không được để trống',
        ];
        $validator = Validator::make($Request->all(), $rules, $message);
        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
                'message'=>$validator->errors()->first()
            ]);
        }

        $notes = new notes;
        $notes->title = $Request->title;
        $notes->description = $Request->description;
        $notes->status = $Request->status;
        if($notes->save()){
            return response()->json([
            'status' => 1,
            'data' => $notes,
            'message' => 'Thêm dữ liệu thành công']);
        }else{
            return response()->json([
            'status' => 0,
            'data' => null,
            'message' => 'Thêm dữ liệu thất bại']);
        }
    }

    public function update(Request $Request)
    {
        $notes = notes::where('id','=',$Request->id)->first();
        return response()->json([
            'message' => 'Thành công',
            'status' => 1,
            'data' => $notes
        ]);
    }


    public function updatePost(Request $Request)
    {
        $rules = [
            'title' => 'Required',
        ];
        $message = [
            'title.Required' => 'Tiêu đề không được để trống',
        ];
        $validator = Validator::make($Request->all(), $rules, $message);
        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
                'message'=>$validator->errors()->first()
            ]);
        }

        $notes =  notes::find($Request->id);
        $notes->title = $Request->title;
        $notes->description = $Request->description;
        $notes->status = $Request->status;
        if($notes->save()){
            return response()->json([
                'message' => 'Sửa Thành công',
                'status' => 1,
                'data' => $notes
            ]);
        }else{
            return response()->json([
                'message' => 'Thất bại',
                'status' => 0,
                'data' => $notes
            ]);
        }
    }

    public function delete(Request $Request)
    {
        $result = notes::where('id','=',$Request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
            'data'=>$result
        ]);
    }
}
