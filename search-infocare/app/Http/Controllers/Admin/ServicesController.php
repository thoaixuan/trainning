<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Services;

class ServicesController extends Controller
{
    public function getServices(){
        $service_list = DB::table('services')->orderBy("id","DESC")->get();
        return view('admin.pages.services.services',['services_list' => $service_list]);
    }
    public function editServices(Request $request){
        $id = $request->input('id');
        $services_name = $request->input('services_name');
        $services_description = $request->input('services_description');
        $services_slug = $request->input('services_slug');
        DB::table('services')->where('id', $id)->update([
            'services_name' => $services_name,
            'services_description' => $services_description,
            'services_slug' => $services_slug
        ]);
        return redirect('/admin-cpanel/services');
    }
    public function storeServices(Request $request) {
        DB::table('services')->insert([
            'services_name' => $request->input('services_name'),
            'services_description' => $request->input('services_description'),
            'services_slug' => $request->input('services_slug')
        ]);
        return redirect('/admin-cpanel/services');
    }
    public function destroyServices($id_service){
        Services::destroy($id_service);
        return redirect('/admin-cpanel/services');
    }
   
}
