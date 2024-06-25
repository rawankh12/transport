<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum',['except'=>['login','register']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scetion = Section::all();
        return response()->json(["Section"=>$scetion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
          'time_opened' => 'required',
          'time_closed'=> 'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $scetion= Section::create([

            'address_id' => $request->address_id,
            'time_opened' => $request->time_opened,
            'time_closed' => $request->time_closed,
            'admin_id' => $request->admin_id
        ]);

      return response()->json([
        'status'=>true,
        'section'=>  $scetion
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
        $scetion = Section::where('id' , $request->id)->get();
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
        $section = Section::find($request->id);

        $section->time_opened = $request->time_opened;
        $section->time_closed = $request->time_closed;
        $section->save();
        return response()->json([$section]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Section::find($request->id);
        $section->delete();
        return response()->json([
            'succes' =>true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
