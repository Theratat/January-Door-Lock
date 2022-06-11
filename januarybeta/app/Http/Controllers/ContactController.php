<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact_group;
use App\Contact_group_member;
use App\Contact;
use App\Account;
use App\GroupKey;
use App\Permission_key;
use App\Http\Resources\GroupResource;
use Illuminate\Support\Facades\DB;
use App\User;
use SimpleXLSX;

class ContactController extends Controller
{
    public function addgroup (Request $request){
        $group = new Contact_group;
        $group ->groupname = $request->groupname;
        $group ->owner_pin = auth()->user()->PIN;
        $group->save();

        return new $group;
    }

    public function deletegroup (Request $request){
        $PINarr = Contact_group_member::where('groupid', $request->groupid)->pluck('contact')->toArray();
        $KeyArr = GroupKey::where('groupid', $request->groupid)->pluck('deviceid')->toArray();
        foreach ($KeyArr as &$device) {
            foreach ($PINarr as &$value) {

                $noti_crt = Notification_status::where('noti_form_id', 2)->value('description');
                $a = explode("$",$noti_crt);
                $b = [$a[0],$device," key",$a[1]];
                $a = implode("",$b);

                $noti_save = new Notification;
                $noti_save->receiver = $value;
                $noti_save->description = $a;
                $noti_save->save();

                if (Permission_key::where('holder', $value)->where('deviceid',$device)->exists()) {
                    $key = new Permission_key;
                    $key = Permission_key::where('holder',$value)->where('deviceid',$device)->delete();
                }
            }
            $delgk = new GroupKey;
            $delgk = GroupKey::where('groupid',$request->groupid)->delete();
        }
        Contact_group::where('groupid', $request->groupid)->delete();        
    }

    public function search (Request $request){
        if (Account::where('PIN', $request->PIN)->exists()){  
            $account = new Account;      
            $account = Account::where('PIN', $request->PIN)->select('firstname', 'lastname')->get();
            return $account;
        }
        return response()->json([
            'account' => 'Not found'
        ]);;
        // return $request;
    }

    public function search_arr (Request $request){
        $PINarr = $request->PIN;
        $arr = [];
        foreach($PINarr as &$value){
            if (Account::where('PIN', $value)->exists()){  
                $account = new Account;      
                $account = Account::where('PIN', $value)->select('firstname', 'lastname')->get();
                $arr[] = $account;
            }
        }
        return $arr;
        // return $request;
    }

    public function delete_gc(Request $request){
        if($request->groupid == 0){
            //no group---->delete from contact
            $devicearr = Permission_key::where('holder',$request->PIN)->pluck('deviceid')->toArray();
            foreach($devicearr as &$device){
                $key = new Permission_key;
                $key = Permission_key::where('holder',$request->PIN)->where('deviceid',$device)->delete();
            }
            $contact = new Contact;
            $contact = Contact::where('contact',$request->PIN)->delete();
        }else{
            //in group----->delete from group
            $key = new GroupKey;
            $keyarr = GroupKey::where('groupid',$request->groupid)->pluck('deviceid')->toArray();
            foreach($keyarr as $key){
                if (Permission_key::where('holder', $request->PIN)->where('deviceid',$key)->exists()) {
                    $key = new Permission_key;
                    $key = Permission_key::where('holder',$value)->where('deviceid',$key)->delete();
                }
            }
            $member = new Contact_group_member;
            $member = Contact_group_member::where('contact',$request->PIN)->delete();
        }
        
    }


    

    public function addcontact (Request $request){
        $PINarr = $request->PIN;
        foreach ($PINarr as &$value) {
            if (!Contact::where('owner', auth()->user()->PIN)->where('contact',$value)->exists()) {
                $contact = new Contact;
                $contact->owner = auth()->user()->PIN;
                $contact->contact = $value;
                $contact->save();
            }

            if(!$request->groupid == null){
                $group = new Contact_group_member;
                $group->groupid = $request->groupid;
                $group->contact = $value; 
                $group->save();
            }
        }
        
        return response()->json(['status'=>'success','message'=>'Contact add!']);  

    }
}
