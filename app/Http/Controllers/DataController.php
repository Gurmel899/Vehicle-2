<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
   public function vehicles() {
   $data = "Berhasil Login";
   return response()->json($data, 200);
   }

   public function vehicleAuth() {
   $data = "Welcome " . Auth::user()->name;
   return response()->json($data, 200);
   }
}