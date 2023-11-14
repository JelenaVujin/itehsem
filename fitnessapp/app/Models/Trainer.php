<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'licence_number',
    ];
    use HasFactory;
    public function workouts(){
        return $this->hasMany(Workout::class);
    }
}
