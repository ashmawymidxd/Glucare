<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        // Retrieve all notifications from the database
        $notifications = Notification::latest()->get();

        return response()->json(['status'=>200,'result'=>$notifications]);
    }
}
