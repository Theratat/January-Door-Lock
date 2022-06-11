<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function addkey(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/key_management/add";
       
        $response = $client->request('POST', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'PIN' => $request['PIN'],
                    'deviceid' => $request['deviceid'],
                    'keytype' => $request['key_type'],
                    'avi_day' =>$request['avi_day'],
                    'time_start' => $request['fromtime'],
                    'time_stop' => $request['totime'],
                    'exp'=>$request['exp'],
                ],
            ]
        );
    }

    public function addkey_group(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/key_management/add";
       
        $response = $client->request('POST', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'groupid' => $request['groupid'],
                    'deviceid' => $request['deviceid'],
                    'keytype' => $request['key_type'],
                    'avi_day' =>$request['avi_day'],
                    'time_start' => $request['time_start'],
                    'time_stop' => $request['time_stop'],
                    'exp'=>$request['exp'],
                ],
            ]
        );
    }

    public function deletekey(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/key_management/delete";
       
        $response = $client->request('DELETE', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'PIN' => $request['PIN'],
                    'deviceid' => $request['deviceid']
                ],
            ]
        );
      
        return redirect()->back();
    }

    public function deletekey_group(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/key_management/groupdelete";
       
        $response = $client->request('DELETE', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'groupid' => $request['groupid'],
                    'deviceid' => $request['deviceid']
                ],
            ]
        );
      
        return redirect()->back();
    }

    public function open(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/device/mqtt_pub',
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'token_key' => $request['token_key'],
                    
                ],
            ]);
        $response = $request->getBody();
        
        return redirect()->back();
    }
}
