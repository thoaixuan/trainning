<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function getHome()
   {
       return view('guest.pages.home.home'); 
   }

   public function searchHome(Request $Request){
    $search = 'word';
    // $search = $Request->input('search');
    // if(empty($search)){
        // $Users = User::leftJoin('projects', 'users.id', '=', 'projects.userID')
        // ->leftJoin('services', 'services.id', '=', 'projects.serviceID')
        // ->select(
        //     'users.id',
        //     'users.full_name',
        //     'users.phone_number',
        //     'projects.projects_name',
        //     'services.services_name',
        //     'projects.id AS projectsID'
        // )
        // ->offset($start)
        // ->limit($limit)
        // ->orderBy($order, $dir)
        // ->get();
    // }else{
        $users = User::leftJoin('projects', 'users.id', '=', 'projects.userID')
        ->leftJoin('services', 'services.id', '=', 'projects.serviceID')
        ->Where(function($query)use($search){
            $query->where('users.full_name', '=', $search)
            ->orwhere('users.keyword', '=', $search)
            ->orwhere('users.phone_number', '=', $search);
        })
        ->select('*'
            // 'users.id',
            // 'users.full_name',
            // 'users.phone_number',
            // 'projects.projects_name',
            // 'services.services_name'
            )
            ->get();
        return $users;
            // }

 
            // $Users = User::with('services_fk')->with('projects_fk')
            // ->Where(function($query)use($search){
            //             $query->where('phone_number', '=', $search)
            //             ->orwhere('full_name', '=', $search);
            //         })
            // ->get();
        
            // return($Users);

        }
}
