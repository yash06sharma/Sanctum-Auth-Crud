<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
                return view('CRUD.user_list');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $editData = User::find($id);
        return $editData;
        // UserResource::collection($editData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $editData = User::find($request->id);
        $editData->name = $request->name;
        $editData->email = $request->email;
        $editData->password = Hash::make($request->password);
        $editData->status = $request->status;
        $editData->type = $request->type;
        $editData->save();
        $msg = "Data updated successfully!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        User::find($id)->delete();
        return response()->json("data Deleted successfully");
    }


    public function Datashow()
    {

    return view('API.dashboard',['users'=>User::all()]);

    }

}
