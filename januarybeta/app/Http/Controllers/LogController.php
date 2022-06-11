<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Log;
use App;

class LogController extends Controller
{
    public function getlog(Request $request){
        $own = Device::where('deviceid', $request->deviceid)->value('owner');
        if(auth()->user()->PIN == $own){
            $logs = Log::where('deviceid', $request->deviceid)->whereDate('created_at' ,'>=', $request->start_log)->orderBy('created_at', 'desc')->get();
            $pdf = App::make('dompdf.wrapper');
            $output = '
            <h3 align="center">'.Log::where('deviceid', $request->deviceid)->value('device_name').'</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
                <tr>
                    <th style="border: 1px solid; padding:12px;" width="30%">Timestamp</th>
                    <th style="border: 1px solid; padding:12px;" width="70%">Name</th>
                </tr>
                ';  
                foreach($logs as $log)
                {
                $output .= '
                <tr>
                    <td style="border: 1px solid; padding:12px;">'.$log->created_at.'</td>
                    <td style="border: 1px solid; padding:12px;">'.$log->firstname.' '.$log->lastname.'</td>
                </tr>
            ';
            }
            $output .= '</table>';
            $pdf->loadHTML($output);
            return $pdf->stream();
        }
        
        return response()->json(['status'=>'fail','message'=>'You do not own this device']);
        
    }
}
