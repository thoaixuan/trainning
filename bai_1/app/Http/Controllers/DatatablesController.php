<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
class DatatablesController extends Controller
{
    public function getIndex(){
        $users= User::orderBy('id','DESC')->get();
        return view('home',compact('users'));
    }
    
    public function anyData()
    {
        return Datatables::of(User::query())
        ->addColumn('action','compoment.action')
        ->toJson(); 
    }

    public function update($id){
        dd('Edit:'.$id);
    }
    public function delete($id){
        dd('Delete:'.$id);
    }
}


