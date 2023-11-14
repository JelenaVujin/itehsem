<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainerCollection;
use App\Models\Trainer;
use App\Http\Resources\TrainerResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    public function index()
    {
        $trainer=Trainer::all();
        if(is_null($trainer)){
            return response()->json(['message'=>"Data not found",'status_code'=>404],404);
        }
        return new TrainerCollection($trainer);
    }
    public function store(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'name'=>'required|max:100|string',
            'licence_number'=>'required|min:10',
            'email'=>'required|email|unique:members',
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $trainer=Trainer::create([
            'name'=>$request->name,
            'licence_number'=>$request->licence_number,
            'email'=>$request->email
        ]);
        return response()->json($trainer);
    }
    public function show(Trainer $trainer)
    {
        return new TrainerCollection($trainer);
    }
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return response()->json('Trainer is successfully deleted.');
    }
    public function update(Request $request, Trainer $trainer)
    {
        $validation=Validator::make($request->all(),[
            'name'=>'required|string|max:20',
            'licence_number'=>'required|max:20|numeric|unique:trainers',
            'email'=>'required|email|unique:trainers'
        ]);
        if($validation->fails()){
            return response()->json($validation->errors());
        }
        $trainer->name=$request->name;
        $trainer->licence_number=$request->licence_number;
        $trainer->email=$request->email;
        $trainer->save();
        return response()->json('Trainer is updated successfully.',200);
    }
}
