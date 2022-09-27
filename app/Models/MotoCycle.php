<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotoCycle extends Model
{
    use HasFactory;
     protected $guarded=[];

     public function vehicle(){
         return $this->belongsTo(Vehicle::class);
     }
}