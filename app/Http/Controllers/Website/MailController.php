<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\EmailContact;


class MailController extends Controller

{
    public function sendEmail(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $messageBody = $request->input('message');

        // return response()->json(['success' => false, 'message' => $request->all()]);
        try {
            // Send email
            Mail::to('uyu365666@gmail.com')->send(new MyMail($name, $subject, $email, $messageBody));

            return response()->json(['success' => true, 'message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error sending email. Please try again']);
        }
    }
}
