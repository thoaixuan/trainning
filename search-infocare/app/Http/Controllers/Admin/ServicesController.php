<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Services;

class ServicesController extends Controller
{
    public function getServices(){
        $service_list = DB::table('services')->orderByDesc("id")->get();
        return view('admin.pages.services.services',['services_list' => $service_list]);
    }
    public function getDataServices(){
        $service_list = DB::table('services')->orderByDesc("id")->get();
        return view('admin.pages.services.data',['services_list' => $service_list]);
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
    public function searchServices(Request $request) {
        $keyword = $request->input('search');
        $output = '';
        $list_search = Services::where(function ($query) use($keyword) {
            $query->where('services_name', 'like', '%' . $keyword . '%')
               ->orWhere('services_description', 'like', '%' . $keyword . '%');
            })
            ->get();
        foreach($list_search as $list) {
            $output .= 
            '
            <tr>
            <td>'.$list->services_name.'</td>
            <td>'.$list->services_description.'</td>
            <td>'.$list->services_slug.'</td>
            <td>
            <button onclick="idEdit(&#39;'.$list->services_name.'&#39,&apos;'.(string)$list->services_description.'&#39,&#39'.$list->services_slug.'&#39,'.$list->id.')"
            type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
            <i class="fas fa-edit"></i>
            </button>
            <button type="button" class="btn btn-danger" id="btn-delete"
            data-url="'.route("service-delete")."/".$list->id.'"
            data-id="'.$list->id.'">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
            </td>
            </tr>
            ';
        }
        return response()->json($output);
    }
   
}
