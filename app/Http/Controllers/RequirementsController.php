<?php

namespace App\Http\Controllers;

use App\Models\Requirements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequirementsController extends Controller
{

    public function index()
    {
        $Requirements = Requirements::all();
        return response()->json(["Requirements"=>$Requirements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'photo_of_univercity_degree'=>'required',
            'driving_licence'=> 'required',
            'description'=>'required',
            'cv'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors(),400);
        }

        $photo_of_univercity_degree = $request->file('photo_of_univercity_degree');
        $newImage = time().$photo_of_univercity_degree->getClientOriginalName();
        $photo_of_univercity_degree->move(public_path('upload') , $newImage);
        $path = "public/upload/$newImage";

        $driving_licence = $request->file('driving_licence');
        $newImage1 = time().$driving_licence->getClientOriginalName();
        $driving_licence->move(public_path('upload') , $newImage1);
        $path1 = "public/upload/$newImage1";

        $cv = $request->file('cv');
        $newImage1 = time().$cv->getClientOriginalName();
        $cv->move(public_path('upload') , $newImage1);
        $path2 = "public/upload/$newImage1";

        $Requirements= Requirements::create([

            'user_id' => $request->user_id,
            'section_id'  => $request->section_id,
            'photo_of_univercity_degree'  => $path,
            'driving_licence'  => $path1,
            'description'  => $request->description,
            'cv'  => $path2
        ]);

      return response()->json([
        'status'=>  true,
        'section'=>  $Requirements
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
        $scetion = Requirements::where('id' , $request->id)->get();
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
        $photo_of_univercity_degree = $request->file('photo_of_univercity_degree');
        $newImage = time().$photo_of_univercity_degree->getClientOriginalName();
        $photo_of_univercity_degree->move(public_path('upload') , $newImage);
        $path = "public/upload/$newImage";

        $driving_licence = $request->file('driving_licence');
        $newImage1 = time().$driving_licence->getClientOriginalName();
        $driving_licence->move(public_path('upload') , $newImage1);
        $path1 = "public/upload/$newImage1";

        $cv = $request->file('cv');
        $newImage1 = time().$cv->getClientOriginalName();
        $cv->move(public_path('upload') , $newImage1);
        $path2 = "public/upload/$newImage1";

        $Requirements = Requirements::find($request->id);

            $Requirements->photo_of_univercity_degree  = $path;
            $Requirements->driving_licence  = $path1;
            $Requirements->description  = $request->description;
            $Requirements->cv  = $path2;

            $Requirements->save();
        return response()->json(['Requirements'=>$Requirements]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Requirements::find($request->id);
        $section->delete();
        return response()->json([
            'succes' =>true,
            'msg' => 'deleted succesfully'
        ]);
    }
}
