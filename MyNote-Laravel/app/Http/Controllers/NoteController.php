<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notes;
use Illuminate\Support\Facades\Hash;


class NoteController extends Controller
{
    public function notes()
    {
        $notes = notes::all();
        return response()->json(['notes' => $notes]);
    }

    public function index()
    {
        return view('pages.notes.notes');
    }

    public function getnote($id){
        $note = notes::find($id); // Retrieve notes with ID 1
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
        $notes->owner = $request->owner;
       

        if($notes->save()){
	        return response()->json(['status' => 1,
                                'data' => $notes]);
	    }else{
            return response()->json(['status' => 0,
            'data' => 'Thêm thất bại']);
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
                'name' => 'Sửa Thành công',
                'status' => 1,
                'data' => $notes
            ]);
        }else{
            return response()->json([
                'name' => 'Thất bại',
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
    public function destroy($id)
    {
        $result = notes::where('id','=',$id)->delete();
        return response()->json([
            'status'=>1,
            'message'=>"Xóa thành công",
        ]);
    }
}
