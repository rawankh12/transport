<?php

namespace App\Http\Controllers;

use App\Models\Trip_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\TripController;
use App\Models\Trips;
use Illuminate\Support\Facades\Auth;

class Trip_RequestController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Trip_Request = Trip_Request::all();
        return response()->json(["Trip_Request" => $Trip_Request]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'start_point' => 'required',
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

        $Trip_Request= Trip_Request::insert([

            'user_id' => Auth::user()->id,
            'trip_id' => $Trips->id,
            'start_point' => $request->start_point,

        ]);


      return response()->json([
        'status'=>  true,
      ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function accept_trip(Request $request)
    {
        if($request->accept == 1)
        {
            return response()->json(['accept']);

        }
          elseif($request->accept == 0)
          {
            $Trip_Request = Trip_Request::orderBy('id', 'desc')->take(1)->first();
            $Trips = Trips::orderBy('id' , 'desc')->take(1)->first();
            $Trips->delete();
            $Trip_Request->delete();
            return response()->json(['not accept']);

          }
        }


        public function accept_trip_sh(Request $request)
        {

            if($request->accept == 1)
            {
                return response()->json(['accept']);

            }
              elseif($request->accept == 0)
              {
                $Trip_Request = Trip_Request::orderBy('id', 'desc')->take(1)->first();
                $Trips = Trips::orderBy('id' , 'desc')->take(1)->first();
                $Trips->delete();
                $Trip_Request->delete();
                return response()->json(['not accept']);

              }
            }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $Trip_Request = Trip_Request::where('id' , $request->id)->get();
        return response()->json([
            'Trip_Request' => $Trip_Request
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
        $Trip_Request = Trip_Request::find($request->id);
        $Trip_Request->start_point = $request->start_point;
        $Trip_Request->num_transport = $request->num_transport;
        $Trip_Request->description = $request->description;

        $Trip_Request->save();
        return response()->json(['Trip_Request' => $Trip_Request]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Trip_Request::find($request->id);
        $section->delete();
        return response()->json([
            'succes' => true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
