<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notes;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class NoteController extends Controller
{
    public function notes(Request $Request)
    {
        $columns [] ='id';
        $columns [] ='title';
        $columns [] ='description';
        $columns [] ='owner';

     
        $limit = $Request->input('length');
        $start = $Request->input('start');
        $order = $columns[$Request->input('order.0.column')];
        $dir = $Request->input('order.0.dir');
        $search = $Request->input('search');
        $totalData =  notes::count();
        if(empty($search)){
            $notes = notes::offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        } else {
            $notes = notes::Where(function($query)use($search){
	            $query->where('title', 'LIKE',"%{$search}%")
	            ->orWhere('description', 'LIKE',"%{$search}%");
	        })
	        ->offset($start)
	        ->limit($limit)
	        ->orderBy($order,$dir)
	        ->get();
	        $totalFiltered =$notes->count();
        }
        $json_data = array(
            "draw"            => intval($Request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalData), 
            "data"            => $notes   
        );
        echo json_encode($json_data); 
    }

    public function index()
    {
        return view('pages.notes.notes');
    }

    public function getnote(Request $Request){
        $note = notes::find($Request->id); 
        return response()->json(['note' => $note]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $notes = new notes;
        $notes->title = $request->title;
        $notes->description = $request->description;
        $notes->owner = auth()->user()->id;
       

        if($notes->save()){
	        return response()->json(['status' => 1,
                                'data' => $notes,
                                'message' => 'Thêm thành công']);
	    }else{
            return response()->json(['status' => 0,
            'data' => null,
            'message' => 'Thêm thất bại']);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $Request)
    {
        $notes =  notes::find($Request->id);
        $notes->title = $Request->title;
        $notes->description = $Request->description;

        if($notes->save()){
            return response()->json([
                'message' => 'Sửa thành công',
                'status' => 1,
                'data' => $notes
            ]);
        }else{
            return response()->json([
                'message' => 'Sửa thất bại',
                'status' => 0,
                'data' => $notes
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $Request)
    {
        $result = notes::where('id','=',$Request->id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
        ]);
    }
}
