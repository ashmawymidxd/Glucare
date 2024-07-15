<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoices;

class PatientInvoicesController extends Controller
{
    public function showInvoices($id){
        $invoice = Invoices::where('id',$id)->first();
        return view('Website/invoices/show',compact('invoice'));
    }

}
