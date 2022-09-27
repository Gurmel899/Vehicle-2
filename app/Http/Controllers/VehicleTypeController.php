<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\MotoCycle;
use App\Models\Car;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Vehicle $vehicle_type)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $type = $request->input('typeNumber');
        if ($type == 1) {
            try {
                            $cars = Car::all();
                            $data = [];
                            foreach ($cars as $car) {
                            $item = [
                            "production_date" => $car->vehicle->production_date,
                            "color" => $car->vehicle->color,
                            "price" => $car->vehicle->price,
                            "machine" => $car->machine,
                            "passenger_capacity" => $car->passenger_capacity,
                            "type" => $car->type,
                            ];

                            $data[] = $item;
                            }

                            return response()->json([
                            "data" => $data,
                            ], 200);
            } catch (Exception $e) {
                return response()->json([
                'message' => $e->getMessage(),
                ], 500);
            }
        }

        if ($type == 2) {
            try {
                $data = [];
                $motoCycles = MotoCycle::all();
                foreach ($motoCycles as $motoCyle) {
                $item = [
                "production_date" => $motoCyle->vehicle->production_date,
                "color" => $motoCyle->vehicle->color,
                "price" => $motoCyle->vehicle->price,
                "machine" => $motoCyle->machine,
                "type_suspention" => $motoCyle->type_suspention,
                "type_transmition" => $motoCyle->type_transmition,
                ];

                $data[] = $item;
                }

                return response()->json([
                "data" => $data,
                ], 200);
            } catch (Exception $e) {
                 return response()->json([
                 'message' => $e->getMessage(),
                 ], 500);
            }
        }
        return response()->json([
        'message' => 'error bro'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}