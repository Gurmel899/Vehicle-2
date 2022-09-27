<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Moto_cycle;
use App\Models\Car;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table ="vehicles";

    public function  cars(){
        return $this->hasMany(Car::class, "vehicle_id", "id");
    }
    public  function  moto_cycles(){
        return $this->hasMany(MotoCycle::class, "vehicle_id", "id");
    }
}