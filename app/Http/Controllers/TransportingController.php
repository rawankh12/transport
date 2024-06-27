<?php

namespace App\Http\Controllers;

use App\Models\Transporting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransportingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Transporting = Transporting::all();
        return response()->json(["Transporting"=>$Transporting]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
          'capacity' => 'required',
          'number'=> 'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $Transporting= Transporting::create([

            'type_tra_id' => $request->type_tra_id,
            'capacity' => $request->capacity,
            'number' => $request->number,
            'admin_id' => Auth::user()->id
        ]);

      return response()->json([
        'status'=>  true,
        'Transporting'=>  $Transporting
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
        $Transporting = Transporting::where('id' , $request->id)->get();
        return response()->json([
            $Transporting
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
        $Transporting = Transporting::find($request->id);

        $Transporting->number = $request->number;
        $Transporting->save();
        return response()->json([$Transporting]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Transporting = Transporting::find($request->id);
        $Transporting->delete();
        return response()->json([
            'succes' =>true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
