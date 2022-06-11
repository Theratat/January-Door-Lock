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
use SimpleXLSX;
use Maatwebsite\Excel\Facades\Excel;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Exceptions\InvalidStructureException as InvalidStructureException;


class ContactController extends Controller
{
    public function addgroup(Request $request){

        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/contact/addgroup";
       
        $response = $client->request('POST', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'groupname' => $request['groupname'],
                ],
            ]
        );
      
        return $response;

    }
    public function delete_contact(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/contact/delete_contact";
        
        $response = $client->request('DELETE',$url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'PIN' => $request['PIN'],
                    'groupid' => $request['groupid'],
                ],
            ]
        );
      
        return redirect()->back();
    }


    public function addcontact(Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/contact/addcontact";
        
        $response = $client->request('POST', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'PIN' => $request['PIN'],
                    'groupid' => $request['groupid'],
                ],
            ]
        );
      
        return redirect()->back();
    }

    public function PinFromXlsx (Request $request){

        $data = array();
        $row = 0;
        if ( $xlsx = SimpleXLSX::parse($request['xlsx']) ) {
            //find PIN column
            try {
                $col = $this->findPinCol($xlsx);
            } catch (InvalidStructureException $e) {
                return redirect()->back()->with('error','xlsx');
            }
            foreach( $xlsx->rows() as $r) {
                if($r[$col] == 'PIN'){
                    continue;
                }
                $data[] = $r[$col];
            }
        } else {
            echo SimpleXLSX::parseError();
        }

        //return $data;
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/contact/addcontact";
        
        $response = $client->request('POST', $url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'PIN' => $data,
                    'groupid' => $request['groupid'],
                ],
            ]
        );
      
        return redirect()->back();
        
    }

    public function findPinCol (SimpleXLSX $xlsx ){
        $col = 0;
        foreach( $xlsx->rows()[0] as $r ) {
            if($r == 'PIN'){
                return $col;
            }
            $col = $col+1;
        }
        throw new InvalidStructureException("Invalid Structure");
    }

    public function deletegroup (Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/contact/deletegroup";
        
        $response = $client->request('DELETE',$url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'groupid' => $request['groupid'],
                ],
            ]
        );
      
        return $response;
    }

    public function search (Request $request){
        $token = session('Authorization');
        $client = new \GuzzleHttp\Client();
        $url = "http://localhost/januarybeta/public/api/contact/search";
        
        $response = $client->get($url, 
            [
                'headers' => [
                    'Authorization' => $token,
                    'Accept' => 'application/json',
                ],
                'json' => [
                    'PIN' => $request['PIN'],
                ],
            ]
        );
      
        return $response;
    }
}
