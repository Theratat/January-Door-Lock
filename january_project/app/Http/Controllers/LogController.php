<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function getlog(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/log/getlog";
       
        $response = $client->get($url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'deviceid' => $request['deviceid'],
                    'start_log' => $request['start_log'],
                ],
            ]
        );
      
        return $response;
    }
}
