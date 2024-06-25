<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Trips;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $Reservation = Reservation::all();
    return response()->json(['Reservation' => $Reservation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $num_seat = Trips::where('id' , $request->trip_id)->value('num_seat');
        if($num_seat > 0)
        {
        $validate = Validator::make($request->all(),
        [
            'image_identity' =>'required',
            'pay' => 'required',
            'attachments' => 'required',
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }

        $image_identity = $request->file('image_identity');
        $newImage = time().$image_identity->getClientOriginalName();
        $image_identity->move(public_path('upload') , $newImage);
        $path = "public/upload/$newImage";

        $Reservation= Reservation::create([

            'user_id' => $request->user_id,
            'trip_id'=> $request->trip_id,
            'image_identity' => $path,
            'pay' => $request->pay,
            'attachments' => $request->attachments,
        ]);

        $trip = Trips::where('id' , $request->trip_id)->value('num_seat');
        $trip = $trip -1;
        $id = $request->trip_id;
        TripController::update_num($trip , $id);

      return response()->json([
        'status'=>true,
        'Reservation'=>  $Reservation
      ]);
    }
    else{

        return response()->json([
            'status'=> false,
            'msg'=> 'you can not reservation'
          ]);

    }
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
        $Reservation = Reservation::where('id' , $request->id)->get();
        return response()->json([
            $Reservation
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
        $time = Trips::where('id' , $request->trip_id)->value('time');
        $Res_time = Reservation::where('id' , $request->id)->where('trip_id' , $request->trip_id)->value('created_at');

        $t = Carbon::create ($time);
        $res_t = Carbon::create($Res_time);


       if($t->subHour(2) <= $res_t)
       {
        $Reservation = Reservation::find($request->id);


        $Reservation->attachments = $request->attachments;
        $Reservation->save();

        return response()->json([$Reservation]);
       }
       else
       {
        return response()->json(['f']);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Reservation::find($request->id);
        $section->delete();
        return response()->json([
            'succes' =>true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
