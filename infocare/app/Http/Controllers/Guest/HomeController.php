<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Projects;
class HomeController extends Controller
{
    public function getHome()
    {
       return view('guest.pages.home.home'); 
    }

    public function searchInfomation(Request $Request){
		$columns[] = 'id';
        $columns[] = 'full_name';
        $columns[] = 'phone_number';
        $columns[] = 'services_name';
        $columns[] = 'projects_name';
        $columns[] = 'keyword';
        $columns[] = 'time_end';
        $columns[] = 'id';

        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');

        $totalData = User::leftJoin('projects', 'users.id', '=', 'projects.userID')
        ->leftJoin('services', 'services.id', '=', 'projects.serviceID')->count();

        if(empty($search)){
            $Users = User::leftJoin('projects', 'users.id', '=', 'projects.userID')
            ->leftJoin('services', 'services.id', '=', 'projects.serviceID')
            ->select(
                'users.id',
                'users.full_name',
                'users.phone_number',
                'users.keyword',
                'projects.projects_name',
                'projects.time_end',
                'services.services_name'
            )
            ->offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
	        ->get();
        }else{
	        $Users = User::leftJoin('projects', 'users.id', '=', 'projects.userID')
				->leftJoin('services', 'services.id', '=', 'projects.serviceID')
                ->Where(function($query)use($search){
                    $query->where('users.full_name', '=', "{$search}")
                    ->orwhere('users.keyword', '=', "{$search}")
				    ->orwhere('users.phone_number', '=', "{$search}");
                })
				->select(
                    'users.id',
                    'users.full_name',
                    'users.phone_number',
                    'users.keyword',
                    'projects.projects_name',
                    'projects.time_end',
                    'services.services_name'
                )
	            ->offset($start)
	            ->limit($limit)
	            ->orderBy($order, $dir)
	            ->get();
		}
        $json_data = array(
            "draw"            => intval($Request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data"            => $Users
        );
        echo json_encode($json_data);
	}

    public function getInformation(Request $Request){
		$projectID = $Request->projectID;
		$project = Projects::where('projects.projects_name', '=' , $projectID)->first();
        return response()->json([
            'name' => 'Thành công',
            'status' => 200,
            'data' => $project
        ]);

	}

}
