<?php

namespace App\Http\Controllers;

use App\Models\MotoCycle;
use Illuminate\Http\Request;

class MotoCycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $moto= Motocycle::all();
         return response()->json([
         'status'=>'valid',
         'data'=>$moto

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
          'type_suspention'=>'required',
          'type_transmition'=>'required',

          ]);

          $moto = new Motocycle();
          $moto->machine=$validated['machine'];
          $moto->type_suspention=$validated['type_suspention'];
          $moto->type_transmition=$validated['type_transmition'];
          $moto->save();

          return response()->json([
          'status'=> 'Success',
          'message'=>'data created Successfuly'
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MotoCycle  $motoCycle
     * @return \Illuminate\Http\Response
     */
    public function show(MotoCycle $motoCycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MotoCycle  $motoCycle
     * @return \Illuminate\Http\Response
     */
    public function edit(MotoCycle $motoCycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MotoCycle  $motoCycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MotoCycle $moto)
    {
        // dd($moto->id);
         $validated = $request->validate([
         'machine'=>'required',
         'type_suspention'=>'required',
         'type_transmition'=>'required',
         ]);
        //   return response()->json([
        //   'message'=>$validated
        //   ]);
         $data = Motocycle::findOrFail($moto->id);
         $data->update([
         'machine' => $validated['machine'],
         'type_suspention' => $validated['type_suspention'],
         'type_transmition' => $validated['type_transmition'],
         ]);

         $data->save();


         return response()->json([
         'message'=> 'updated Successfuly'
         ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MotoCycle  $motoCycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(MotoCycle $motoCycle)
    {
        //
    }
}