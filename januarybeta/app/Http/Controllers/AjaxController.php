<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contact;
use App\Contact_group;
use App\Contact_group_member;
use App\Permission_key;
use App\Office_hour;
use App\Device;
use App\Account;
use App\Notification;

class AjaxController extends Controller
{
    public function fetch_group (){
        return Contact_group::where('owner_pin',auth()->user()->PIN)->select('groupname','groupid')->get();
    }

    public function fetch_contact (){
        $contact = DB::table('accounts')
            ->join('contacts', 'PIN', '=', 'contact')
            ->where('owner',auth()->user()->PIN)->select('firstname', 'lastname' , 'PIN')->get();

            return $contact;
    }

    public function fetch_group_member (Request $request){
        $member = DB::table('accounts')
        ->join('contact_group_members', 'PIN', '=', 'contact')
        ->where('groupid',$request->groupid)->select('firstname', 'lastname','PIN')->get();

        return $member;
    }
    

    public function fetch_OH_data (Request $request){
        $oh = DB::table('office_hours')
        ->join('devices', 'office_hours.deviceid', '=', 'devices.deviceid')
        ->where('office_hours.deviceid', $request->deviceid)->select('device_name','office_hours.deviceid','avi_day','avi_time_start','avi_time_stop','status')->get();

        return $oh;
    }

    public function fetch_key (){
        return Permission_key::where('holder',auth()->user()->PIN)->get();
    }

    public function fetch_key_pres (){
        $key = DB::table('permission_keys')
        ->join('devices', 'permission_keys.deviceid', '=', 'devices.deviceid')
        ->where('holder',auth()->user()->PIN)->select('token_key','device_name','permission_keys.deviceid')->get();

        return $key;
    }

    public function searchgroup (Request $request){
        return Contact_group::where('groupid', $request->groupid )->get('groupname');
    }

    public function fetch_OH (){
        $OH = DB::table('office_hours')
            ->join('devices', 'office_hours.deviceid', '=', 'devices.deviceid')
            ->where('owner',auth()->user()->PIN)->get();

            return $OH;
        
    }

    public function fetch_user (){
        
        $user = new Account;
        $user->firstname= auth()->user()->firstname;
        $user->lastname = auth()->user()->lastname;

        return $user;
        
    }

    public function fetch_device (){
        return Device::where('owner',auth()->user()->PIN)->select('device_name', 'deviceid')->get();
    }

    public function fetch_notification (){
        return Notification::where('receiver',auth()->user()->PIN)->orderBy('created_at', 'desc')->select('description','created_at')->get();
    }

    public function fetch_management_page (){
        $device = $this->fetch_device();
        $group = $this->fetch_group();
        $contact = $this->fetch_contact();
        return response()->json([
            'Device' => $device,
            'Group' => $group,
            'Contact' => $contact,
        ]);
    }

    public function fetch_setOH_page (){
        $OH = $this->fetch_OH();
        $device = $this->fetch_device();
        return response()->json([
            'Device' => $device,
            'Office_hour' => $OH,
        ]);
    }

}
