<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundAccount;

class FundAccountController extends Controller
{
    // get all fundAccount data
    public function index()
    {
        $fundAccount = FundAccount::all();
       if($fundAccount->count() > 0){
            return response()->json([
                'status' => true,
                'message'=>'fundAccount data',
                'data' => $fundAccount
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'no fundAccount data',
            'data' => $fundAccount
        ]);
    }

    // store new fundAccount data
    public function store(Request $request)
    {
        $fundAccount = FundAccount::create($request->all());
        return response()->json([
            'status' => true,
            'message'=>'fundAccount created',
            'data' => $fundAccount
        ]);
    }

    // get fundAccount data by id
    public function show($id)
    {
        $fundAccount = FundAccount::find($id);
        if($fundAccount){
            return response()->json([
                'status' => true,
                'message'=>'fundAccount data founded',
                'data' => $fundAccount
            ]);
        }
        return response()->json([
            'status' => false,
            'message'=>'fundAccount data not founded',
            'data' => $fundAccount
        ]);
    }

    // update fundAccount data by id
    public function update(Request $request, $id)
    {
        $fundAccount = FundAccount::find($id);
        $fundAccount->update($request->all());
        return response()->json([
            'status' => true,
            'message'=>'fundAccount updated',
            'data' => $fundAccount
        ]);
    }

    // delete fundAccount data by id
    public function destroy($id)
    {
        $fundAccount = FundAccount::find($id);
        $fundAccount->delete();
        return response()->json([
            'status' => true,
            'message'=>'fundAccount deleted',
            'data' => $fundAccount
        ]);
    }

}
