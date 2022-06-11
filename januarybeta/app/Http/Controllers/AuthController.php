<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AuthResource;
use App\Http\Resources\AuthResourceCollection;
use App\Account;

use Validator;

use App\User;
use JWTFactory;
use JWTAuth;
use JWTGuard;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use App\Permission_key;
use App\Notification;
use App\Device;

class AuthController extends Controller
{
    public function regis(Request $request) 
    {
        $credentials = $request->only('firstname','lastname','email','username', 'password');
        $user = new Account();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->PIN = strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8));
        
        $user->save();

        return new AuthResource($user);
    }

    public function web_login(Request $request){
        $credentials = $request->only('username', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        return response()->json([
            // 'token' => $token
            //compact('token'),

            'status' => 'success',
            'data' =>[
                'token' => $token,
                'owner_status' => auth()->user()->owner_status
            ]
        ])->withHeaders([
            'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
        ]) ->cookie('access_token', $token, 60);
        //]);
    }

    public function mobile_login(Request $request){  
        $credentials = $request->only('username', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $permKeys = Permission_key::where('holder', auth()->user()->PIN)->get();
        foreach ($permKeys as $key){
            $key->device_name = Device::where('deviceid', $key->deviceid)->value('device_name');
            $key->keytype = $key->ext['key_type'];
            if($key->ext['key_type'] == 'schedule'){
                $key->day = $key->ext['day'];
                $key->time_start = $key->ext['time_start'];
                $key->time_stop = $key->ext['time_stop'];
            }
            
        }

        return response()->json([
            'token' => $token,
            'firstname' => auth()->user()->firstname,
            'lastname' => auth()->user()->lastname,
            'PIN' => auth()->user()->PIN,
            'permission_key' => $permKeys,
            'notification' => Notification::where('receiver',auth()->user()->PIN)->get(),
            ]);
    }

    public function show(Account $account)
    {
        return $account;
    }

    public function ownerstat(Request $request)
    {
        if(!auth()->user()->owner_status){
            return response()->json([
                'error' => 'not owner',
                'owner_stat' => auth()->user()->owner_status
        ], 500);
        }
        return response()->json([
            'firstname' => auth()->user()->firstname,
            'lastname' => auth()->user()->lastname,
        ], 200);
    }

    public function logout() {
        auth()->logout();
    
        return response()->json([
            'status' => 'success',
            'message' => 'logout'
        ], 200);
    }

    public function tryAuth (){
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }
}
