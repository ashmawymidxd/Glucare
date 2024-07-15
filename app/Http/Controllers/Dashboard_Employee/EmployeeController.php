<?php

namespace App\Http\Controllers\Dashboard_Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoices;
use Carbon\Carbon;
class EmployeeController extends Controller
{
    public function index(){
        $allInvoicesCount = Invoices::count();
        $sumInvoices = Invoices::sum('total_with_tax');
        $totalaccualPrice = Invoices::sum('price');
        $todayInvoicesCount = Invoices::whereDate('created_at', Carbon::today())->count();
        $todayInvoicesSum = Invoices::whereDate('created_at', Carbon::today())->sum('total_with_tax');
        return view('Dashboard.employee_dashboard.dashboard',compact('totalaccualPrice','allInvoicesCount','sumInvoices','todayInvoicesCount','todayInvoicesSum'));
    }
}
