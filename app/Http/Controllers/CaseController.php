<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CaseController extends Controller
{
    public function newCase(Request $request){
        DB::table('case')->insert([
            'case_number'=>$request->input('case_number'),
            'reference'=>$request->input('reference'),
            'date_of_filing'=>$request->input('date_of_filing'),
            'official_receipt'=>$request->input('official_receipt'),
            'complainant'=>$request->input('complainant'),
            'complainantAddress'=>$request->input('complainantAddress'),
            'respondent'=>$request->input('respondent'),
            'respondentAddress'=>$request->input('respondentAddress'),
            'title'=>$request->input('title'),
            'nature'=>$request->input('nature'),
            'date_summons'=>$request->input('date_summons'),
            'first_hearing'=>$request->input('first_hearing'),
            'final_hearing'=>$request->input('final_hearing'),
            'action'=>$request->input('action'),
            'date_of_action'=>$request->input('date_of_action'),
            'date_of_filing_motion'=>$request->input('date_of_filing_motion'),
            'date_of_hearing_motion'=>$request->input('date_of_hearing_motion'),
            'date_of_issuance'=>$request->input('date_of_issuance'),
            'date_of_agreement'=>$request->input('date_of_agreement'),
            'execution'=>$request->input('execution'),
            'remark'=>$request->input('remark'),
            'status'=>$request->input('status'),
            'location'=>$request->input('location'),
            'locationLatLng'=>$request->input('locationLatLng'),
            'date_created'=>date('m/d/Y')
        ]);
        return response()->json(['title'=>'success', 'message'=>'Success to add new case']);
    }

    public function updateCase(Request $request){
        $affected = DB::table('case')
            ->where('id', $request->input('id'))
            ->update([
                'case_number'=>$request->input('case_number'),
                'reference'=>$request->input('reference'),
                'date_of_filing'=>$request->input('date_of_filing'),
                'official_receipt'=>$request->input('receipt'),
                'complainant'=>$request->input('complainant'),
                'complainantAddress'=>$request->input('complainantAddress'),
                'respondent'=>$request->input('respondent'),
                'respondentAddress'=>$request->input('respondentAddress'),
                'title'=>$request->input('title'),
                'nature'=>$request->input('nature'),
                'date_summons'=>$request->input('date_summons'),
                'first_hearing'=>$request->input('first_hearing'),
                'final_hearing'=>$request->input('final_hearing'),
                'action'=>$request->input('action'),
                'date_of_action'=>$request->input('date_of_action'),
                'date_of_hearing_motion'=>$request->input('date_of_hearing_motion'),
                'date_of_issuance'=>$request->input('date_of_issuance'),
                'date_of_agreement'=>$request->input('date_of_agreement'),
                'execution'=>$request->input('execution'),
                'remark'=>$request->input('remark'),
                'status'=>$request->input('status'),
                'location'=>$request->input('location'),
                'locationLatLng'=>$request->input('locationLatLng'),
            ]);

        return response()->json(['title'=>'success', 'message'=>'Success to update the case']);
    }

    public function getLocationCase(){
        $location = DB::table('case')->get();
        $array = array();
        foreach($location as $loc){
            $str = explode(',',$loc->locationLatLng);
            array_push($array, [
                'lat' => $str[0],
                'lng' => $str[1],
                'icon' => 'assets/img/map-marker-cyan.png',
                'label' => 'Case',
                'content' => "<div style='
                text-align: center;
                font-size: 17px;
                width: 100%;
                border-bottom: 1px solid #ebebeb;
                font-weight: 550;
                margin-bottom: 4px'>
                    <label>CASE</label>
                </div>
                <table>
                <tr>
                    <th style='width: 110px; font-size: 14px'>Case Number : </th>
                    <td>$loc->case_number</td>
                </tr>
                <tr>
                    <th style='width: 110px; font-size: 14px'>Title : </th>
                    <td>$loc->title</td>
                </tr>
                <tr>
                    <th style='width: 110px; font-size: 14px'>Complainant : </th>
                    <td>$loc->complainant</td>
                </tr>
                <tr>
                    <th style='width: 110px; font-size: 14px'>Respondent : </th>
                    <td>$loc->respondent</td>
                </tr>
                <tr>
                    <th style='padding-top: 4px; width: 110px; font-size: 14px'>Date of filing : </th>
                    <td style='padding-top: 4px;'>$loc->date_of_filing</td>
                </tr>
                <tr>
                    <th style='padding-top: 4px; width: 110px; font-size: 14px'>action : </th>
                    <td style='padding-top: 4px;'>$loc->action</td>
                </tr>
                <tr>
                    <th style='padding-top: 4px; width: 110px; font-size: 14px'>Location : </th>
                    <td style='padding-top: 4px;'>$loc->location</td>
                </tr>
                </table>"
            ]);
        }
        return response()->json($array);
    }

    public function deleteCase($id){
        $report = DB::table('case')->where('id', $id)->delete();
        return response()->json($report);
    }
    
    public function getCase(){
        $case = DB::table('case')->get();
        return response()->json($case);
    }
}
