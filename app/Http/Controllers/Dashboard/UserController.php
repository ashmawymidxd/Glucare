<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Image;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
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

        try {

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
            $this->verifyAndStoreImage($request,'photo','doctors','upload_image',$doctors->id,'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.create');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorfail($id);
        return view('website.profile.index',compact('user'));
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
        // return $request;
        DB::beginTransaction();

        try {

            $user = User::findorfail($request->id);

            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->name = $request->name;
            $user->save();

            // update photo
            if ($request->has('photo')){
                // Delete old photo
                if ($user->image){
                    $old_img = $user->image->filename;
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

         $this->Delete_attachment('upload_image','doctors/'.$request->filename,$request->id,$request->filename);
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
                  $this->Delete_attachment('upload_image','doctors/'.$doctor->image->filename,$ids_doctors,$doctor->image->filename);
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
            $doctor->update([
                'password'=>Hash::make($request->password)
            ]);

            session()->flash('edit_pass');
            return redirect()->back();
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

            session()->flash('edit_status');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
