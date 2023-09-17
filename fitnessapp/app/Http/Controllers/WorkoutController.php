<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index(){
        $workout=Workout::all();
        return new WorkoutCollection($workout);
    }
    public function show(Workout $workout){
        return new WorkoutResource($workout);
    }
}
