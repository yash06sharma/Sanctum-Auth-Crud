<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Preuser;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userRegister(Request $request)
    {
        $user = new Preuser;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->save();

         return response([
            'Data' => $user,
        ],201);
    }



      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $data = $request->user()->createToken($request->email)->plainTextToken;
              return response([
            'LoginType'=> $user->type,
            'Token' => $data,
            'credentials'=> $user->email,
        ],201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }


    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userLinkActivation($id)
    {

        $preuser = Preuser::find($id);
        if(!$preuser){

        return response([
            'user' => "Sorry not registered!!",
        ]);
        }

        $user = new User;
        $user->name = $preuser->name;
        $user->email = $preuser->email;
        $user->password = $preuser->password;
        $user->status = 'Active';
        $user->type = 'User';
        $user->save();

        return response([
            'user' => $preuser,
        ]);

    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userdashboard(Request $request)
    {

        $data = User::where('email', $request->email)->first();
        if($data->type != 'User'){
            return $data->type;
        }
             return $data->type;

     //  return UserResource::collection(User::all());


    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logoutUser(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

          return response([
            'user' => "Logged Out!!",

        ]);
    }




}
