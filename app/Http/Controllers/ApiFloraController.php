<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flora;
class ApiFloraController extends Controller
{
    //
    public function index() {
        $floras=Flora::all();
        return $floras;
    }
    public function show($id) {
        $floras=Flora::findorFail($id);
        return $floras;
    }
    public function store(Request $request) {
        $request->validate([

        ]);
        $flora=new Flora();
        $flora->name=$request->name;
        $flora->user_id=$request->user_id;
        $flora->number=$request->number;
        $flora->note=$request->note;

        $flora->save();
        return "Crop saved";
    }
    public function update(Request $request,string $id) {
        $flora=Flora::find($id);
        $request->validate([
            'name'=>['required', 'min:2','max:100'],
            'number'=>['required'],
            'note'=>['required','max:255']
        ]);
        $flora->name=$request->name;
        $flora->number=$request->number;
        $flora->note=$request->note;

        $flora->update();
        return "Crop updated successfully";
    }
    public function delete($id) {
        $flora=Flora::findorFail($id);
        $flora->delete();
        return "Crop deleted";
    }
}
