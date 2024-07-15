<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Debugbar;
use Exception;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        Debugbar::error('Error!');
        Debugbar::startMeasure('render');
        try {
            throw new Exception('foobar');
        } catch (Exception $e) {
            Debugbar::addThrowable($e);
        }
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' =>'0, 0, 155',
            'chart_height' => '700px',
        ];
        $chart1 = new LaravelChart($chart_options);

        return view('Dashboard.index', compact('chart1'));
        Debugbar::stopMeasure('render');
    }
}
