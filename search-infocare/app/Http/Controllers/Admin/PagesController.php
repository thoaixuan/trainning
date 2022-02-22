<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Pages;

class PagesController extends Controller
{
    public function getPages(){
        $pages_list = DB::table('pages')->get();
        return view('admin.pages.pages.pages',['pages_list' => $pages_list]);
    }
    public function editPages(Request $request){
        $id = $request->input('id');
        $pages_name = $request->input('pages_name');
        $pages_content = $request->input('pages_content');
        $pages_slug = $request->input('pages_slug');
        DB::table('pages')->where('id', $id)->update([
            'pages_name' => $pages_name,
            'pages_content' => $pages_content,
            'pages_slug' => $pages_slug,
            
        ]);
        return redirect('/admin-cpanel/pages');
    }
    public function storePages(Request $request) {
        DB::table('pages')->insert([
            'pages_name' => $request->input('pages_name'),
            'pages_content' => $request->input('pages_content'),
            'pages_slug' => $request->input('pages_slug')
        ]);
        return redirect('/admin-cpanel/pages');
    }
    public function destroyPages($id_page){
        Pages::destroy($id_page);
        return redirect('/admin-cpanel/pages');
    }
}
