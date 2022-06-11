<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function adddevice(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/device/add";
       
        $response = $client->request('POST', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'SERIAL' => $request['serial'],
                    'device_name' => $request['device_name'],
                    'device_location' => $request['device_location']
                ],
            ]
        );
      
        return redirect()->back();
    }

    public function setOH(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/device/setOH";
       
        $response = $client->request('PUT', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'deviceid' => $request['deviceid'],
                    'avi_day' => $request['avi_day'],
                    'time_start' => $request['fromtime'],
                    'time_stop' => $request['totime'],
                    'status' => $request['status']
                ],
            ]
        );
      
        return redirect()->back();
    }

    public function serialcheck (Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/device/checkvalid";
        
        $response = $client->get($url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'serial' => $request['serial'],
                ],
            ]
        );
      
        return $response;
    }
}
