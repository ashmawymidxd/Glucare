<?php

namespace App\Http\Livewire;

use App\Events\CreateInvoice;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoices;
// use App\Models\Notification;
use App\Models\User;
use App\Models\PatientAccount;
use App\Models\Service;
use App\Models\UserAppointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailContact;

class InvoicesLivewire extends Component
{
    public $InvoiceSaved,$InvoiceUpdated;
    public $show_table = true;
    public $username;
    public $section_id;
    public $section_name;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price,$discount_value = 0 ,$patient_id,$doctor_id,$type,$Service_id,$invoice_id,$catchError;


    public function mount(){

        $this->username = auth()->user()->name;
     }



    public function render()
    {
        return view('livewire.invoices_livewire.invoices-livewire', [
            'invoices'=>Invoices::get(),
            'Patients'=> User::all(),
            'Doctors'=> Doctor::all(),
            'UserAppointment' =>UserAppointment::where('type','end')->get(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value'=> $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);
    }

    public function show_form_add(){
        $this->show_table = false;
    }

    public function print($id)
    {
        $invoice = Invoices::findorfail($id);
        return Redirect::route('Print_invoices',[
            'invoice_date' => $invoice->invoice_date,
            'doctor_id' => $invoice->Doctor->name,
            'section_id' => $invoice->Section->name,
            'type' => $invoice->type,
            'price' => $invoice->price,
            'discount_value' => $invoice->discount_value,
            'tax_rate' => $invoice->tax_rate,
            'total_with_tax' => $invoice->total_with_tax,
        ]);

    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_name = $doctor_id->section->name;
        $this->section_id = $doctor_id->section->id;
        $this->price = 200;

    }


    public function edit($id){

        $this->show_table = false;
        $this->updateMode = true;
        $invoice = Invoices::findorfail($id);
        $this->invoice_id = $invoice->id;
        $this->patient_id = $invoice->patient_id;
        $this->doctor_id = $invoice->doctor_id;
        $this->section_id = $invoice->section_id;
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_name = $doctor_id->section->name;
        $this->price = $invoice->price;
        $this->discount_value = $invoice->discount_value;
    }



    public function store(){

        // DB::beginTransaction();
        try {

            // في حالة التعديل
            if($this->updateMode){

                $invoices = Invoices::findorfail($this->invoice_id);
                $invoices->invoice_date = date('Y-m-d');
                $invoices->patient_id = $this->patient_id;
                $invoices->doctor_id = $this->doctor_id;
                $invoices->section_id = $this->section_id;
                $invoices->price = $this->price;
                $invoices->discount_value = $this->discount_value;
                $invoices->tax_rate = $this->tax_rate;
                // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                $invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                $invoices->total_with_tax = $invoices->price -  $invoices->discount_value + $invoices->tax_value;
                $invoices->save();

                $fund_accounts = FundAccount::where('invoice_id',$this->invoice_id)->first();
                $fund_accounts->date = date('Y-m-d');
                $fund_accounts->invoice_id = $invoices->id;
                $fund_accounts->Debit = $invoices->total_with_tax;
                $fund_accounts->credit = 0.00;
                $fund_accounts->save();
                $this->InvoiceUpdated =true;
                $this->show_table =true;


            }

            // في حالة الاضافة
            else{

                $invoices = new Invoices();
                $invoices->invoice_date = date('Y-m-d');
                $invoices->patient_id = $this->patient_id;
                $invoices->doctor_id = $this->doctor_id;
                $invoices->section_id = $this->section_id;
                $invoices->price = $this->price;
                $invoices->discount_value = $this->discount_value;
                $invoices->tax_rate = $this->tax_rate;
                // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                $invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                $invoices->total_with_tax = $invoices->price -  $invoices->discount_value + $invoices->tax_value;
                $invoices->save();

                $fund_accounts = new FundAccount();
                $fund_accounts->date = date('Y-m-d');
                $fund_accounts->invoice_id = $invoices->id;
                $fund_accounts->Debit = $invoices->total_with_tax;
                $fund_accounts->credit = 0.00;
                $fund_accounts->save();
                $this->InvoiceSaved =true;
                $this->show_table =true;

                // database notification
                $user = User::find(auth('employee')->user()->id);
                $patientInvoices = Invoices::latest()->first();
                Notification::send($user, new \App\Notifications\AddpatientInvoices($patientInvoices));
            }
            DB::commit();
        }

        catch (\Exception $e) {
            DB::rollback();
            $this->catchError = $e->getMessage();
        }

    }


    public function delete($id){

     $this->invoice_id = $id;

    }

    public function destroy(){
        Invoices::destroy($this->invoice_id);
        return redirect()->to('/invoices_livewire');
    }



}
