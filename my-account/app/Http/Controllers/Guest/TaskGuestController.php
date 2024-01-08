<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Task;

class TaskGuestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.task.task', (['user'=>$user]));
    }

    public function getDatatable(Request $request)
    {
        $columns = ['id', 'nametask', 'startdate', 'file', 'userjoin', 'userCreate'];

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');

        $userName = Auth::user()->name;

        $userNames = explode(',', $userName);

        $query = Task::where(function ($query) use ($userNames) {
            foreach ($userNames as $name) {
                $query->orWhere('userjoin', 'like', '%' . trim($name) . '%');
            }
        });
        $totalData = $query->count();
        $task = $query->offset($start)
            ->limit($limit)
            ->orderBy($orderColumn, $orderDirection)
            ->get();

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $task
        ];
        return response()->json($json_data);
    }
    public function createTaskPost(Request $request)
    {
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validator=Validator::make($request->all(),[
            'nametask'=>['required'],
            'startdate'=>['required'],
            'enddate'=>['required']
        ],$message);

        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
                'message'=>$validator->errors()->first()
            ]);
        }

        $task = new Task($request->all());
        if($task->save()){
            return response()->json([
            'status' => 1,
            'data' => $task,
            'message' => 'Thêm dữ liệu thành công']);
        }else{
            return response()->json([
            'status' => 0,
            'data' => null,
            'message' => 'Thêm dữ liệu thất bại']);
        }
    }

    public function update(Request $request)
    {
        $task = Task::where('id','=',$request->id)->first();
        return response()->json([
            'message' => 'Thành công',
            'status' => 1,
            'data' => $task
        ]);
    }

    public function updateTaskPost(Request $request)
    {
        $message=[
            'required'=>":attribute không được để trống",
        ];
        $validator=Validator::make($request->all(),[
            'nametask'=>['required'],
            'startdate'=>['required'],
            'enddate'=>['required']
        ],$message);
        if($validator->fails()){
            return response()->json([
                'status'=>0,
                'data' => null,
                'message'=>$validator->errors()->first()
            ]);
        }

        $task =  Task::find($request->id);
        $task->nametask = $request->nametask;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->file = $request->file;
        $task->startdate = $request->startdate;
        $task->enddate = $request->enddate;
        $task->progress = $request->progress;
        $task->userjoin = $request->userjoin;
        if($task->save()){
            return response()->json([
                'message' => 'Sửa Thành công',
                'status' => 1,
                'data' => $task
            ]);
        }else{
            return response()->json([
                'message' => 'Thất bại',
                'status' => 0,
            ]);
        }
    }
    public function delete(Request $request)
    {
        $result = Task::where('id','=',$request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
        ]);
    }

    public function uploadFile(Request $request)
    {
        if ($request->hasFile('files')) {
            $uploadedFiles = $request->file('files');
            $fileUrls = [];

            foreach ($uploadedFiles as $file) {
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $fileUrl = asset('uploads/' . $fileName);
                $fileSize = filesize(public_path('uploads/' . $fileName));
                $fileUrls[] = [
                    'fileName' => $fileName,
                    'fileUrl' => $fileUrl,
                    'fileSize' => $fileSize,
                ];
            }
            return response()->json([
                'message' => 'Upload ảnh thành công',
                'status' => 1,
                'url'=>$fileUrls,
            ]);
        } else{
            return response()->json([
                'message' => 'Thất bại',
                'status' => 0,
            ]);
        }
    }
}
