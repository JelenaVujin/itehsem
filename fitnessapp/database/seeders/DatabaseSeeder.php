<?php

namespace Database\Seeders;
use App\Models\Trainer;
use App\Models\Workout;
use App\Models\User;
use App\Models\WorkoutType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Workout::truncate();
        Trainer::truncate();
        User::truncate();
        WorkoutType::truncate();
        User::insert(['username'=>'maja','email'=>'maja@gnauk.com','password'=>bcrypt('123')]);
        Trainer::insert(['name'=>'jel','licence_number'=>123,'email'=>'jel@gmail.com']);
        WorkoutType::insert(['type'=>'cardio']);
        User::factory(3)->create();
        $workout1=new Workout();
        $workout1->duration=60;
        $workout1->description="60 min cardio";
        $workout1->trainer_id=1;
        $workout1->save();
        Workout::create(['duration'=>30,'description'=>'short HIIT','trainer_id'=>1]);
    }
}
