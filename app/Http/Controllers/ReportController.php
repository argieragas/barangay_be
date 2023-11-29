<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;

class ReportController extends Controller
{

    public function newReport(Request $request){
        DB::table('report')->insert([
            'involved'=>$request->input('involved'),
            'incident'=>$request->input('incident'),
            'location'=>$request->input('location'),
            'latlng'=>$request->input('latlng'),
            'date'=>$request->input('date')
        ]);
        return response()->json(['title'=>'success', 'message'=>'Success to add new report']);
    }

    public function deleteReport($id){
        $report = DB::table('report')->where('id', $id)->delete();
        return response()->json($report);
    }

    public function updateReport(Request $request){
        $affected = DB::table('report')
            ->where('id', $request->input('id'))
            ->update([
                'involved'=>$request->input('involved'),
                'incident'=>$request->input('incident'),
                'location'=>$request->input('location'),
                'latlng'=>$request->input('latlng'),
                'date'=>$request->input('date')
            ]);
            return response()->json(['title'=>'success', 'message'=>'Success to update the report']);
    }


    public function getLocationReport(){
        $location = DB::table('report')->select('latlng')->get();
        $array = array();
        foreach($location as $loc){
            $str = explode(',',$loc->latlng);
            array_push($array, [
                'lat' => $str[0],
                'lng' => $str[1],
                'icon' => 'assets/img/map-marker-red.png',
                'label'=> 'Report'
            ]);
        }
        return response()->json($array);
    }
}
