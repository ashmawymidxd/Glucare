<?php

namespace App\Http\Controllers\Dashboard_Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Doctor;


class ReportsController extends Controller
{
    public function index(){
        $chart_options = [
            'chart_title' => 'Doctor by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('Dashboard.employee_dashboard.reports.index',compact('chart1'));
    }

    public function doctors_reports(){
        $chart_options = [
            'chart_title' => 'Doctor by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Doctor',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'pie',
        ];
        $chart2 = new LaravelChart($chart_options);
        // get 10 doctors
        $doctors = Doctor::orderBy('created_at','desc')->take(10)->get();
        return view('Dashboard.employee_dashboard.reports.doctors_reports',compact('chart2','doctors'));
    }
}
