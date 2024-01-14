<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Userdev;

class UserDevController extends Controller
{
    public function index()
    {
        return view('pages.userdev.dev');
    }
    public function getData(){
        $columns = ['id', 'phongban_name', 'phongban_description'];

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $columns[$request->input('order.0.column')];
        $orderDirection = $request->input('order.0.dir');


        $totalData = Userdev::count();

        $users = $query->offset($start)
            ->limit($limit)
            ->orderBy($orderColumn, $orderDirection)
            ->get();
        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $users
        ];

    }
}
