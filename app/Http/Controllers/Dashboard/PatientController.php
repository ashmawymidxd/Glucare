<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Image;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use UploadTrait;
    public function index()
    {
        $patients = User::get();
        return view('Dashboard.Patients.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard.Patients.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // try {

            $request->validate([
                'name' => 'required|unique:users|max:255',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required',
            ],[

                'name.required' =>'please enter patient name',
                'email.unique' =>'excusme the email aready exist',
            ]);

            $patients = new User();
            $patients->name = $request->name;
            $patients->email = $request->email;
            $patients->password = Hash::make($request->password);
            $patients->phone = $request->phone;
            $patients->status = 1;
            $patients->save();

            //Upload img
            $this->verifyAndStoreImage($request,'photo','profile/users','upload_image',$patients->id,'App\Models\User');

            DB::commit();
            return response()->json(['message' => 'Patient data added successfully']);
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
        $patient = User::findorfail($id);
        return view('Dashboard.Patients.edit',compact('patient'));
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

            $patient = User::findorfail($request->id);

            $patient->email = $request->email;
            $patient->phone = $request->phone;
            $patient->save();
            // store trans
            $patient->name = $request->name;
            $patient->save();

            if ($request->has('photo')){
                // Delete old photo
                if ($patient->image){
                    $old_img = $patient->image->filename;
                    $this->Delete_attachment('upload_image','profile/users/'.$old_img,$request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request,'photo','profile/users','upload_image',$request->id,'App\Models\User');
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

         $this->Delete_attachment('upload_image','profile/users/'.$request->filename,$request->id,$request->filename);
       }
          User::destroy($request->id);
          session()->flash('delete');
          return redirect()->route('Patients.index');
      }

      //---------------------------------------------------------------

      else{

          // delete selector patient
          $delete_select_id = explode(",", $request->delete_select_id);
          foreach ($delete_select_id as $ids_patients){
              $patient = User::findorfail($ids_patients);
              if($patient->image){
                  $this->Delete_attachment('upload_image','profile/users/'.$patient->image->filename,$ids_patients,$patient->image->filename);
              }
          }

          User::destroy($delete_select_id);
          session()->flash('delete');
          return redirect()->route('Patients.index');
      }

    }

    public function update_password(Request $request)
    {
        // return $request;
        try {
            $patient = User::findorfail($request->id);

            $request->validate([
                'password' => 'required',
            ],[
                'password.required' =>'please enter new password',
            ]);

            $patient->update([
                'password'=>Hash::make($request->password)
            ]);

            // session()->flash('edit_pass');
            // return redirect()->back();
            return response()->json(['message' => 'patient password data updated successfully']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_status(Request $request)
    {
        try {
            $patient = User::findorfail($request->id);
            $patient->update([
                'status'=>$request->status
            ]);

            // session()->flash('edit_status');
            // return redirect()->back();
            return response()->json(['message' => 'Patient status data updated successfully']);

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
