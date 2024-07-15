<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Employee;

class RoleReportController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('Dashboard.Reports.index',compact('sections'));
    }

    public function search_role_reports(Request $request){

        $repoType = $request->repoType;

        $sections = Section::all();

        if ($repoType == 'Doctors') {

            if ($request->section && $request->startDate =='' && $request->endDate =='') {

               $doctors = Doctor::select('*')->where('section_id','=',$request->section)->get();
               return view('Dashboard.Reports.index',compact('doctors','sections'));
            }

            else {

                $startDate = date('Y-m-d', strtotime($request->startDate));
                $endDate = date('Y-m-d', strtotime($request->endDate));
                $doctors = Doctor::whereBetween('created_at', [$startDate, $endDate])
                                ->where('section_id', $request->section)
                                ->get();

                return view('Dashboard.Reports.index', compact('doctors', 'sections'));
            }
        }

        elseif ($repoType == 'Patients') {

            if ($request->diabetes_type && $request->min_age =='' && $request->max_age =='') {
                $diabetes_type = $request->diabetes_type;

                $patients = User::whereHas('patientDiabetes', function ($query) use ($diabetes_type) {
                    $query->where('diabetes_type', $diabetes_type);
                })->get();

                return view('Dashboard.Reports.index', compact('patients','sections'));
            }
            else {
                // return $request->all();
                $diabetes_type = $request->diabetes_type;
                $minAge = $request->min_age;
                $maxAge = $request->max_age;

                $patients = User::whereHas('patientDiabetes', function ($query) use ($diabetes_type) {
                    $query->where('diabetes_type', $diabetes_type);
                })->whereHas('patientData', function ($query) use ($minAge, $maxAge) {
                    $query->whereBetween('age', [$minAge, $maxAge]);
                })->get();

                return view('Dashboard.Reports.index', compact('patients','sections'));
            }

        }

        elseif($repoType == 'Employees'){

            $startDate = date('Y-m-d', strtotime($request->startDate));
            $endDate = date('Y-m-d', strtotime($request->endDate));
            $employees = Employee::whereBetween('created_at', [$startDate, $endDate])->get();

            return view('Dashboard.Reports.index', compact('employees', 'sections'));
        }
        else{
            return view('Dashboard.Reports.index',compact('sections'));
        }
    }
}
