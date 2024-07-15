<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use UploadTrait;
    public function index()
    {
        $doctors = Doctor::with('doctorappointments')->get();
        return view('Dashboard.Doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sections = Section::all();
        $appointments = Appointment::all();
        return view('Dashboard.Doctors.add',compact('sections','appointments'));
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
                'name' => 'required|unique:sections|max:255',
                'email' => 'required',
                'password' => 'required',
                'speciality' => 'required',
                'qualification' => 'required',
                'experience' => 'required',
                'section_id' => 'required',
                'phone' => 'required',
            ],[

                'name.required' =>'please enter doctor name',
                'email.unique' =>'excusme the email aready exist',
            ]);

            $doctors = new Doctor();
            $doctors->name = $request->name;
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->speciality = $request->speciality;
            $doctors->qualification = $request->qualification;
            $doctors->experience = $request->experience;
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            $doctors->save();

            // insert pivot tABLE
            $doctors->doctorappointments()->attach($request->appointments);


            //Upload img
            $this->verifyAndStoreImage($request,'photo','profile/doctors','upload_image',$doctors->id,'App\Models\Doctor');

            DB::commit();
            // session()->flash('add');
            // return redirect()->route('Doctors.create');
            return response()->json(['message' => 'Doctor data added successfully']);

        // }
        // catch (\Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }

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
        $sections = Section::all();
        $appointments = Appointment::all();
        $doctor = Doctor::findorfail($id);
        return view('Dashboard.Doctors.edit',compact('sections','appointments','doctor'));
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

            $doctor = Doctor::findorfail($request->id);

            $doctor->email = $request->email;
            $doctor->section_id = $request->section_id;
            $doctor->phone = $request->phone;
            $doctor->save();
            // store trans
            $doctor->name = $request->name;
            $doctor->save();

            // update pivot tABLE
            if ($request->appointments){
                $doctor->doctorappointments()->sync($request->appointments);
            }
            // update photo
            if ($request->has('photo')){
                // Delete old photo
                if ($doctor->image){
                    $old_img = $doctor->image->filename;
                    $this->Delete_attachment('upload_image','profile/doctors/'.$old_img,$request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request,'photo','profile/doctors','upload_image',$request->id,'App\Models\Doctor');
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

         $this->Delete_attachment('upload_image','profile/doctors/'.$request->filename,$request->id,$request->filename);
       }
          Doctor::destroy($request->id);
          session()->flash('delete');
          return redirect()->route('Doctors.index');
      }

      //---------------------------------------------------------------

      else{

          // delete selector doctor
          $delete_select_id = explode(",", $request->delete_select_id);
          foreach ($delete_select_id as $ids_doctors){
              $doctor = Doctor::findorfail($ids_doctors);
              if($doctor->image){
                  $this->Delete_attachment('upload_image','profile/doctors/'.$doctor->image->filename,$ids_doctors,$doctor->image->filename);
              }
          }

          Doctor::destroy($delete_select_id);
          session()->flash('delete');
          return redirect()->route('Doctors.index');
      }

    }

    public function update_password(Request $request)
    {
        // return $request;
        try {
            $doctor = Doctor::findorfail($request->id);

            $request->validate([
                'password' => 'required',
            ],[
                'password.required' =>'please enter new password',
            ]);

            $doctor->update([
                'password'=>Hash::make($request->password)
            ]);

            // session()->flash('edit_pass');
            // return redirect()->back();
            return response()->json(['message' => 'Doctor password data updated successfully']);
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_status(Request $request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'status'=>$request->status
            ]);

            return response()->json(['message' => 'Doctor status data updated successfully']);
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
