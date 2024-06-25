<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{

    public function index_t()
    {
    $type = Type::all();
    return response()->json(['Reservation' => $type]);
    }
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Trips = Trips::all();
        return response()->json(["Trips"=>$Trips]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
          'section_end'=>'required|string',
          'date' => 'required',
          'time' => 'required',
          'num_seat'=> 'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $Trips= Trips::create([

            'section_id' => $request->section_id,
            'transport_id' => $request->transport_id,
            'type_id' => $request->type_id,
            'section_end' => $request->section_end,
            'date' => $request->date,
            'time' => $request->time,
            'num_seat' => $request->num_seat
        ]);

      return response()->json([
        'status'=>  true,
        'Trips'=>  $Trips
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $scetion = Trips::where('id' , $request->id)->get();
        return response()->json([
            $scetion
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Trips = Trips::find($request->id);
        $Trips->section_end = $request->section_end;
        $Trips->date = $request->date;
        $Trips->time = $request->time;
        $Trips->num_seat = $request->num_seat;

        $Trips->save();
        return response()->json(['Trips'=>$Trips]);
    }

    static function update_num($trip , $id)
    {
        $Trips = Trips::find($id);
        $Trips->num_seat = $trip;

        $Trips->save();
        return response()->json(['Trips'=>$Trips]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Trips::find($request->id);
        $section->delete();
        return response()->json([
            'succes' =>true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
