<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded =[];
  protected $table ="cars";


    public function Vehicle(){
        return $this-> BelongsTo(Vehicle::class);
    }

}