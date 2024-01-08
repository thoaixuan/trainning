<?php

namespace App\Http\Controllers\Admin;
use App\notes;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NoteAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.notes.notes', (['user'=>$user]));
    }
    public function getDatatable(Request $request)
    {
        $columns = ['id', 'title', 'description', 'status'];

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $columns[$request->input('order.0.column')];
        $orderDirection = $request->input('order.0.dir');
        $searchValue = $request->input('search');

        $query = notes::query();
        if (!empty($searchValue)) {
            $query->where(function($find) use ($searchValue) {
                $find->where('title', 'LIKE', "%{$searchValue}%");
            });
        }

        $totalData = notes::count();
        $notes = $query->offset($start)
            ->limit($limit)
            ->orderBy($orderColumn, $orderDirection)
            ->get();
            $json_data = [
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalData),
                "data" => $notes
            ];

        return response()->json($json_data);

    }

    public function createPost(Request $Request)
    {
        $rules = [
            'title' => 'required',
        ];
        $message = [
            'title.required' => 'Tiêu đề không được để trống',
        ];
        $validator = Validator::make($Request->all(), $rules, $message);
        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
                'message'=>$validator->errors()->first()
            ]);
        }

        $notes = new notes($Request->all());
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
