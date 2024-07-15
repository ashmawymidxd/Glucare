<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use UploadTrait;
    public function index()
    {
        $setting = setting::get()->first();
        return view('Dashboard.Settings.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'website_name' => 'required',
            'website_logo' => 'required',
            'website_description' => 'required',
            'website_email' => 'required',
            'website_phone' => 'required',
            'website_address' => 'required',
            'website_facebook' => 'required',
            'website_twitter' => 'required',
            'website_instagram' => 'required',
            'website_youtube' => 'required',
            'website_whatsapp' => 'required',
        ]);
        $setting = setting::findOrFail($id);
        $setting->update([
            'website_name' => $request->website_name,
            'website_logo' => $request->website_logo,
            'website_description' => $request->website_description,
            'website_email' => $request->website_email,
            'website_phone' => $request->website_phone,
            'website_address' => $request->website_address,
            'website_facebook' => $request->website_facebook,
            'website_twitter' => $request->website_twitter,
            'website_instagram' => $request->website_instagram,
            'website_youtube' => $request->website_youtube,
            'website_whatsapp' => $request->website_whatsapp,
        ]);

         // update photo
         if ($request->has('website_logo')){
            // Delete old photo
            if ($setting->website_logo){
                $old_img = $setting->image->filename;
                $this->Delete_attachment('upload_image','logo/'.$old_img,$id);
            }
            //Upload img
            $this->verifyAndStoreImage($request,'website_logo','logo','upload_image',$id,'App\Models\setting');
        }
        DB::commit();

        session()->flash('success', 'the settings has been updated successfully');
        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
