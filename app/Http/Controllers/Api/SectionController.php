<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    // get all section data
    public function index()
    {
        $section = Section::all();
        if($section->count() > 0){
            return response()->json([
                'status' => true,
                'message'=>'section data',
                'data' => $section
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no section data',
            'data' => $section
        ]);
    }

    // store new section data
    public function store(Request $request)
    {
        $section = Section::create($request->all());
        return response()->json([
            'status' => true,
            'message'=>'section created',
            'data' => $section
        ]);
    }

    // get section data by id
    public function show($id)
    {
        $section = Section::find($id);
        if($section){
            return response()->json([
                'status' => true,
                'message'=>'section data founded',
                'data' => $section
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'section data not founded',
            'data' => $section
        ]);
    }

    // update section data by id
    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        if($section){
            $section->update($request->all());
            return response()->json([
                'status' => true,
                'message'=>'section data updated',
                'data' => $section
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'section data not founded',
            'data' => $section
        ]);
    }

    // delete section data by id
    public function destroy($id)
    {
        $section = Section::find($id);
        if($section){
            $section->delete();
            return response()->json([
                'status' => true,
                'message'=>'section data deleted',
                'data' => $section
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'section data not founded',
            'data' => $section
        ]);
    }
}
