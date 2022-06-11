<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Permission_key;
use App\notification_status;
use App\notification;
use App\Device;
use Carbon\Carbon;

class expKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:expKey';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pkey = Permission_key::where('expire','<',Carbon::now('Asia/Bangkok'))->get();
        foreach($pkey as &$key){
            $noti_des = Notification_status::where('noti_form_id',3)->value('description');
            $a = explode("$",$noti_des);
            $dname = Device::where('deviceid',$key->deviceid)->value('device_name'); 
            $b = [$a[0],$dname," key has",$a[1]];
            $a = implode("",$b);
            $noti_save = new Notification;
            $noti_save->receiver = $key->holder;
            $noti_save->description = $a;
            $noti_save->save();
        }
        $pkey = Permission_key::where('expire','<',Carbon::now('Asia/Bangkok'))->delete();
        
    }
}
