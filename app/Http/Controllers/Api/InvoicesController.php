<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoices;

class InvoicesController extends Controller
{
    // get all invoices data
    public function index()
    {
        $invoices = Invoices::all();
        if($invoices->count() > 0){
            return response()->json([
                'status' => true,
                'message'=>'invoices data',
                'data' => $invoices
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no invoices data',
            'data' => $invoices
        ]);
    }

    // store new invoices data
    public function store(Request $request)
    {
        $invoices = Invoices::create($request->all());
        return response()->json([
            'status' => true,
            'message'=>'invoices created',
            'data' => $invoices
        ]);
    }

    // get invoices data by id
    public function show($id)
    {
        $invoices = Invoices::find($id);
        if($invoices){
            return response()->json([
                'status' => true,
                'message'=>'invoices data founded',
                'data' => $invoices
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'invoices data not founded',
            'data' => $invoices
        ]);
    }

    // update invoices data by id
    public function update(Request $request, $id)
    {
        $invoices = Invoices::find($id);
        if($invoices){
            $invoices->update($request->all());
            return response()->json([
                'status' => true,
                'message'=>'invoices data updated',
                'data' => $invoices
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'invoices data not founded',
            'data' => $invoices
        ]);
    }

    // delete invoices data by id
    public function destroy($id)
    {
        $invoices = Invoices::find($id);
        if($invoices){
            $invoices->delete();
            return response()->json([
                'status' => true,
                'message'=>'invoices data deleted',
                'data' => $invoices
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'invoices data not founded',
            'data' => $invoices
        ]);
    }
}
