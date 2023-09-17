<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;

class UserWorkoutController extends Controller
{
    public function index($user_id){
        $workout=Workout::get()->where('user_id',$user_id);
        if(is_null($workout))
        return response()->json("Data not found",404);
        return response()->json($workout);
    }
}
