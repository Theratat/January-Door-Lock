<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;
use App\Permission_key;
use App\notification;
use App\GroupKey;
use App\notification_status;
use App\Contact_group_member;
use App\Device;
use Carbon\Carbon;

class Key_managementController extends Controller
{
    public function add (Request $request){
        if(!$request->groupid == 0){

            //add groupkey if not exist
            if (!GroupKey::where('groupid', $request->groupid)->where('deviceid',$request->deviceid)->exists()){
                $savegk = new GroupKey;
                $savegk->groupid = $request->groupid;
                $savegk->deviceid = $request->deviceid;
                $savegk->save();
            }
            
            $PINarr = Contact_group_member::where('groupid', $request->groupid)->pluck('contact')->toArray();
        }elseif($request->has('PIN')){
            $PINarr = $request->PIN;
        }
        foreach ($PINarr as &$value) {
            if (!Permission_key::where('holder', $value)->where('deviceid',$request->deviceid)->exists()) {
                $key = new Permission_key;
                $key->token_key = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 60);
                $key->holder = $value;
                $key->deviceid = $request->deviceid;
                $key->ext = [
                'key_type' => $request->keytype,
                'day' => $request->avi_day,
                'time_start' => $request->time_start,
                'time_stop' => $request->time_stop,
                ];
                if($request->keytype == 'One-time'){
                    $key->expire = Carbon::now('Asia/Bangkok')->add(10, 'minute');
                }else if($request->keytype == 'schedule'){
                    $key->expire = $request->exp;
                }
                
                
                $noti_crt = Notification_status::where('noti_form_id', 1)->value('description');
                $a = explode("$",$noti_crt);
                if($request->keytype == 'schedule'){
                    $c = implode("",[",[",implode(",",$key->ext['day']),"],",$key->ext['time_start'],"-",$key->ext['time_stop']] );
                }else{$c = null;}
                $d = implode("",[$key->ext['key_type'],$c]);
                $dname = Device::where('deviceid',$request->deviceid)->value('device_name'); 
                $b = [$a[0],$dname," key (",$d,")",$a[1],auth()->user()->firstname," ",auth()->user()->lastname];
                $a = implode("",$b);

                $noti_save = new Notification;
                $noti_save->receiver = $value;
                $noti_save->description = $a;
                $noti_save->save();
                $key->save();
            }
            
        }
        return response()->json(['status'=>'success','message'=>'Key add']);
    }

    public function delete (Request $request){
        $noti_crt = Notification_status::where('noti_form_id', 2)->value('description');
        $a = explode("$",$noti_crt);
        $dname = Device::where('deviceid',$request->deviceid)->value('device_name'); 
        $b = [$a[0],$dname," key",$a[1]];
        $a = implode("",$b);

        $noti_save = new Notification;
        $noti_save->receiver = $request->PIN;
        $noti_save->description = $a;
        $noti_save->save();

        if (Permission_key::where('holder', $request->PIN)->where('deviceid',$request->deviceid)->exists()) {
            $key = new Permission_key;
            $key = Permission_key::where('holder',$request->PIN)->where('deviceid',$request->deviceid)->delete();
        }

        return $noti_save;
    }
    
    public function notification (Request $request){
        $noti = Notification_status::where('noti_form_id', 1)->value('description');
        $a = explode("$",$noti);
        $b = [$a[0],$request->device_name,"(",$request->ext,")",$a[1],auth()->user()->firstname,auth()->user()->lastname];
        $a = implode(" ",$b);
        return $a;
    }

    public function groupdelete (Request $request){
        if (GroupKey::where('groupid',$request->groupid)->where('deviceid',$request->deviceid)->exists()) {

            $PINarr = Contact_group_member::where('groupid', $request->groupid)->pluck('contact')->toArray();
            foreach ($PINarr as &$value) {

                $noti_crt = Notification_status::where('noti_form_id', 2)->value('description');
                $a = explode("$",$noti_crt);
                $dname = Device::where('deviceid',$request->deviceid)->value('device_name'); 
                $b = [$a[0],$dname," key",$a[1]];
                $a = implode("",$b);

                $noti_save = new Notification;
                $noti_save->receiver = $value;
                $noti_save->description = $a;
                $noti_save->save();

                if (Permission_key::where('holder', $value)->where('deviceid',$request->deviceid)->exists()) {
                    $key = new Permission_key;
                    $key = Permission_key::where('holder',$value)->where('deviceid',$request->deviceid)->delete();
                }

                $delgk = new GroupKey;
                $delgk = GroupKey::where('groupid',$request->groupid)->where('deviceid',$request->deviceid)->delete();
            }
            return response()->json(['status'=>'success','message'=>'Key delete']);
        }
        return response()->json(['status'=>'fail','message'=>'Something went wrong. . .']);
    }
}
