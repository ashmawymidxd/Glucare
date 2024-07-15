<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Image;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use UploadTrait;
    public function index()
    {
        $employees = Employee::get();
        return view('Dashboard.Employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:employees|max:255',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ],[

            'name.required' =>'please enter employee name',
            'email.unique' =>'excusme the email aready exist',
        ]);

        $employees = new Employee();
        $employees->name = $request->name;
        $employees->email = $request->email;
        $employees->password = Hash::make($request->password);
        $employees->employee_experience = $request->employee_experience;
        $employees->employee_qualification = $request->employee_qualification;
        $employees->phone = $request->phone;
        $employees->status = 1;
        $employees->save();

        //Upload img
        $this->verifyAndStoreImage($request,'photo','profile/employees','upload_image',$employees->id,'App\Models\Employee');

        DB::commit();
        return response()->json(['message' => 'Employee data added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findorfail($id);
        return view('Dashboard.Employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {

            $employee = Employee::findorfail($request->id);

            $employee->email = $request->email;
            $employee->employee_experience = $request->employee_experience;
            $employee->employee_qualification = $request->employee_qualification;
            $employee->phone = $request->phone;
            $employee->save();
            // store trans
            $employee->name = $request->name;
            $employee->save();

            if ($request->has('photo')){
                // Delete old photo
                if ($employee->image){
                    $old_img = $employee->image->filename;
                    $this->Delete_attachment('upload_image','profile/employees/'.$old_img,$request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request,'photo','profile/employees','upload_image',$request->id,'App\Models\Employee');
            }

            DB::commit();
            session()->flash('edit_data');
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
      if($request->page_id==1){

       if($request->filename){

         $this->Delete_attachment('upload_image','profile/employees/'.$request->filename,$request->id,$request->filename);
       }
          Employee::destroy($request->id);
          session()->flash('delete');
          return redirect()->route('Employees.index');
      }

      //---------------------------------------------------------------

      else{
          // delete selector employees
          $delete_select_id = explode(",", $request->delete_select_id);
          foreach ($delete_select_id as $ids_employees){
              $employee = Employee::findorfail($ids_employees);
              if($employee->image){
                  $this->Delete_attachment('upload_image','profile/employees/'.$employee->image->filename,$ids_employees,$employee->image->filename);
              }
          }

          Employee::destroy($delete_select_id);
          session()->flash('delete');
          return redirect()->route('Employees.index');
      }

    }

    public function update_password(Request $request)
    {
        try {
            $employee = Employee::findorfail($request->id);

            $request->validate([
                'password' => 'required',
            ],[
                'password.required' =>'please enter new password',
            ]);

            $employee->update([
                'password'=>Hash::make($request->password)
            ]);

            return response()->json(['message' => 'employee password data updated successfully']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_status(Request $request)
    {
        try {
            $employee = Employee::findorfail($request->id);
            $employee->update([
                'status'=>$request->status
            ]);

            return response()->json(['message' => 'employee status data updated successfully']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
