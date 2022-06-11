<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use JWTFactory;
use JWTAuth;
use JWT;
use User;
use Cookies;
use JWTGuard;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;
use GuzzleHttp\Exception\ClientException as ClientException;
use GuzzleHttp\Exception\ServerException as ServerException;

class AuthController extends Controller
{

    public function login(Request $request){
        session()->flush();
        try {
            $client = new \GuzzleHttp\Client();
            $url = "http://localhost/januarybeta/public/api/auth/web_login";
            $data = $request->all();
        
            $response = $client->request('POST', $url, 
                [
                    // 'headers' => [
                    //     'Authorization' => 'Bearer '.$token,
                    //     'Accept' => 'application/json',
                    // ],
                    'json' => [
                        'username' => $request['username'],
                        'password' => $request['password'],
                        'response_type' => 'token',
                    ],
                ]
            );

            $token = json_decode((string) $response->getBody(), true)['data']['token'];    
            $own = json_decode((string) $response->getBody(), true)['data']['owner_status'];      

            session()->push('Authorization', 'Bearer '.$token);
            session()->push('owner_stat', $own);
            if($own == 0){
                return redirect()->route('login')->with('error',1);
            }else{
                return redirect()->route('bridge');
            }
        } catch (ClientException $e) {
            return redirect()->route('login')->with('error',2);
        }
    }

    public function signup(Request $request){
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/auth/regis";
       
        $response = $client->request('POST', $url, 
            [
                'json' => [
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'email' => $request['email'],
                    'username' => $request['username'],
                    'password' => $request['password']
                ],
            ]
        );

        return redirect()->route('login');
    }

    public function logout(Request $request){
        $token = session('Authorization');
        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->get('http://localhost/januarybeta/public/api/auth/logout',
                [
                
                    'headers' => [
                        'Authorization' => $token,
                        'Accept' => 'application/json',
                    ],
                ]);
            $response = $request->getBody();
            session()->flush();

            return redirect()->route('login');
        } catch (ServerException $e) {
            return redirect()->route('login');
        }
        // $client = new \GuzzleHttp\Client();
        // $request = $client->get('http://localhost/januarybeta/public/api/auth/logout',
        //     [
            
        //         'headers' => [
        //             'Authorization' => $token,
        //             'Accept' => 'application/json',
        //         ],
        //     ]);
        // $response = $request->getBody();
        // session()->flush();

        // return redirect()->route('login');
    }
}