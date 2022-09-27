<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = Car::all();
        return response()->json([
            'status'=>'success',
            'data'=>$car,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine'=>'required',
            'passenger_capacity'=>'required',
            'type'=>'required',
        ]);

        $car = new Car();
        $car->machine = $validated['machine'];
        $car->passenger_capacity = $validated['passenger_capacity'];
        $car->type= $validated['type'];
        $car->save();

        return response()->json([
            'status'=>'Valid',
            'massage'=>'Data Created Successfuly',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
         $validated = $request->validate([
         'machine'=>'required',
         'passenger_capacity'=>'required',
         'type'=>'required',
         ]);

         $data = Car::findOrFail($car->id);
            $data->update([
                'machine' => $validated['machine'],
                'passenger_capacity' => $validated['passenger_capacity'],
                'type' => $validated['type'],
            ]);
            $data->save();


            return response()->json([
                'message'=> 'updated Successfuly'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}