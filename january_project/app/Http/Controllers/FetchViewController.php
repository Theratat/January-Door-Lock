<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FetchViewController extends Controller
{
    public function fetch_management(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchpage_key',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_OH(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchpage_OH',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_OH_data(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/ohdata',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'deviceid' => $request['deviceid'],
                    
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_group(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchgroup',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_contact(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchcontact',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_device(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchdevice',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_key(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchkey_pres',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_group_member(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchgroup_member',
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'groupid' => $request['groupid'],
                    
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function searchgroup(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/searchgroup',
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'groupid' => $request['groupid'],
                    
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function fetch_user(){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $request = $client->get('http://localhost/januarybeta/public/api/ajax/fetchuser',
            [
            
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
            ]);
        $response = $request->getBody();
        
        return $response;
    }

    public function req(Request $request){
        return $request;
    }

    
}
