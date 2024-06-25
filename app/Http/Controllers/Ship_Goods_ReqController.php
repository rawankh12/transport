<?php

namespace App\Http\Controllers;

use App\Models\Ship_Goods_Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Ship_Goods_ReqController extends Controller
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
        $Ship_Goods = Ship_Goods_Request::all();
        return response()->json(["Ship_Goods"=>$Ship_Goods]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'image_goods' => 'required',
            'quantity' => 'required',
            'description' => 'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }
        $Ship_Goods= Ship_Goods_Request::create([

            'user_id' => $request->user->id,
            'trip_id' => $request->trip_id,
            'section_id' => $request->section_id,
            'image_goods' => $request->image_goods,
            'quantity' => $request->quantity,
            'description' => $request->description
        ]);

      return response()->json([
        'status'=>true,
        'Ship_Goods'=>  $Ship_Goods
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
        $Ship_Goods = Ship_Goods_Request::where('id' , $request->id)->get();
        return response()->json([
            $Ship_Goods
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
        $Ship_Goods = Ship_Goods_Request::find($request->id);

        $Ship_Goods->image_goods = $request->image_goods;
        $Ship_Goods->quantity = $request->quantity;
        $Ship_Goods->quantity = $request->description;
        $Ship_Goods->save();
        return response()->json([$Ship_Goods]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Ship_Goods = Ship_Goods_Request::find($request->id);
        $Ship_Goods->delete();
        return response()->json([
            'succes' =>true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
