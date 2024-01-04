<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TaskAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.task.task', (['user'=>$user]));
    }

    public function getDatatable(Request $request)
    {
        $columns = ['id', 'title', 'file', 'status'];

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $columns[$request->input('order.0.column')];
        $orderDirection = $request->input('order.0.dir');
        $totalData = notes::count();
        $notes = notes::offset($start)
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

        return response()->json($json_data);
    }
}
