<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Account;
use App\Serial;
use App\Permission_key;
use App\Log;
use App\Office_hour;
use Salman\Mqtt\MqttClass\Mqtt;
use Auth;


class DeviceController extends Controller
{
    public function checkValid (Request $request){
        $account = new Serial;
        $account = Serial::where('SERIAL', $request->serial)->get();
        if(!$account ->isEmpty()){
            return 'valid';
        }
        return 'invalid';
    }

    public function add (Request $request){
        $serial = new Serial;
        $serial = Serial::where('SERIAL', $request->SERIAL)->get();
        if(!$serial ->isEmpty()){
            $device = new Device;
            $device->device_name = $request->device_name;
            $device->device_location = $request->device_location;
            $device->owner = auth()->user()->PIN;

            $device->save();
            
            Serial::where('SERIAL', $request->SERIAL)->delete();

            $key = new Permission_key;
            $key->token_key = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 60);
            $key->holder = auth()->user()->PIN;
            $key->deviceid = Device::max('deviceid');
            $key->ext = [
                'key_type' => 'permanant',
            ];
            $key->save();

            $account = Account::find(auth()->user()->PIN);
            $account->owner_status = 1;
            $account->save();
            
            
            return response()->json(['status'=>'success','message'=>'Device assign']);
        }
        return response()->json(['status'=>'fail','message'=>'this serial is invalid']);

        //return $request;
    }

    public function setOH (Request $request){
        $own = Device::where('deviceid', $request->deviceid)->value('owner');
        if(auth()->user()->PIN == $own){
            
            if(!Office_hour::find($request->deviceid)==null){
                $oh = Office_hour::find($request->deviceid);
            }else{
                $oh = new Office_hour;
            }
    
            $oh->deviceid = $request->deviceid;
            $oh->avi_day = $request->avi_day;
            $oh->avi_time_start = $request->time_start;
            $oh->avi_time_stop = $request->time_stop;
            $oh->status = $request->status;

            $oh->save();

            return response()->json(['status'=>'success','message'=>'Office hour has been updated']);  
        }
        
        return response()->json(['status'=>'fail','message'=>'You do not own this device']);
    }

    public function mqtt_pub(Request $request){
        if(!Permission_key::find($request->token_key)==null){
            $deviceid=Permission_key::where('token_key',$request->token_key)->value('deviceid');
            $mqtt = new Mqtt();
            $output = $mqtt->ConnectAndPublish('topic','on');
            if ($output === true){
                $log = new Log;
                $log->firstname = Account::where(
                    'PIN',Permission_key::where('token_key',$request->token_key)->value('holder')
                )->value('firstname');
                $log->lastname = Account::where(
                    'PIN',Permission_key::where('token_key',$request->token_key)->value('holder')
                )->value('lastname');
                $log->deviceid = $deviceid;
                $log->device_name = Device::where('deviceid',$deviceid)->value('device_name');
                $log->save();

                $checks = Permission_key::where('token_key',$request->token_key)->get();
                foreach($checks as $check){
                    if($check->ext['key_type'] == 'One-time'){
                        Permission_key::where('token_key',$request->token_key)->delete();
                    }
                }
                return response()->json([
                    'status'=>'success',
                ]);
            }
            return response()->json(['status'=>'sending fail']);
        }
        return response()->json(['status'=>'key not found']);
    }   
}
