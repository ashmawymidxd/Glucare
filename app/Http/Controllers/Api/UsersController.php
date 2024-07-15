<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    // get all users with messages succuees and data
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => true,
            'message'=>'users data',
            'data' => $users
        ]);
    }

    // store new user
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message'=>'validation error',
                'data' => $validator->errors()
            ]);
        }
        // encrypt password
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        return response()->json([
            'status' => true,
            'message'=>'user created',
            'data' => $user
        ]);
    }

    // get user by id
    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => true,
            'message'=>'user data founded',
            'data' => $user
        ]);
    }

    // update user by id
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message'=>'validation error',
                'data' => $validator->errors()
            ]);
        }
        $user = User::find($id);
        $request['password'] = bcrypt($request['password']);
        $user->update($request->all());
        return response()->json([
            'status' => true,
            'message'=>'user updated',
            'data' => $user
        ]);
    }


    // delete user by id
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'status' => true,
            'message'=>'user deleted',
            'data' => $user
        ]);
    }


}
