<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkoutController extends Controller
{
    public function index(){
        $workout=Workout::all();
        return new WorkoutCollection($workout);
    }
    public function show(Workout $workout){
        return new WorkoutCollection($workout);
    }
    public function store(Request $request){
        $validation=Validator::make($request->all(),[
        'duration'=>'required|max:255',
        'description'=>'required|string|max:255',
        'user_id'=>'required|max:10',
        'trainer_id'=>'required|max:10',
        'workout_type_id'=>'required|max:10'
    ]);
    if($validation->fails()){
        return response()->json($validation->errors());
    }
    $workout=Workout::create([
        'user_id'=>$request->user_id,
        'trainer_id'=>$request->trainer_id,
        'workout_type_id'=>$request->workout_type_id,
        'duration'=>$request->duration,
        'description'=>$request->description,
        ]);
        return response()->json($workout);
    }
    public function destroy(Workout $workout){
        $workout->delete();
        return response()->json("Workout deleted!");
    }
}
