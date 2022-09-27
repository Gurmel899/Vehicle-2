<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\MotoCycle;
use App\Models\Car;
// use Validator;
use Illuminate\Http\Request;

class VehicleController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::all();
        return response()->json([
            'status' => 'ok',
            'stok' => $vehicle->count(),
            'data' => $vehicle
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $vehicle = $request->$vehicle;
        // if ($vehicle==1) {
        // $data=MotoCycle::where(id,1)->get();
        // $rules=[
        // 'machine'=>'machine',
        // 'type_transmition'=>'type_transmition',
        // 'type_suspention'=>'type_suspention',
        // ];

        // }else{
        // $data=Car::where(id,1)->get();
        // $rules=[
        // 'machine'=>'machine',
        // 'passenger_capacity'=>'passenger_capacity',
        // 'type'=>'type',
        // ];
        // }
        // $validator= $vehicle->get($data,$rules)->first();
        // if($validator->fails()){

        // return response()->json($validator->error()->toJson(),400);
        // }




        $validated = $request->validate([
            'production_date' => 'required',
            'color' => 'required',
            'price' => 'required',

        ]);

        $vehicle = new Vehicle();
        $vehicle->production_date= $validated['production_date'];
        $vehicle->color= $validated['color'];
        $vehicle->price= $validated['price'];
        $vehicle->save();

        return response()->json([
            'status' => 'success',
            'message' => 'data created successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
    //    $data = $vehicle->id;
    //    returwn
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
            $validated = $request->validate([
            'production_date' => 'required',
            'color' => 'required',
            'price' => 'required',
        ]);

          $vehicleId = Vehicle::findOrFail($vehicle->id);
          $vehicleId->update([
          'production_date' => $validated['production_date'],
          'color' => $validated['color'],
          'price' => $validated['price'],
        ]);
        $vehicleId->save();



          return response()->json([
          'message'=> 'updated Successfuly'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
          $vehicle->delete();
         return response()->json([
          'status'=>'delele is Successfuly'
          ]);
    }
}