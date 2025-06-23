<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "city" => "required|string",
            "subject" => "required|string",
            "message" => "required|string"
        ]);

        Contact::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "phone"=> $request->phone,
            "city"=> $request->city,
            "subject"=> $request->subject,
            "message"=> $request->message
        ]);

        return to_route("contact")->with("success", "Message sent successfully");
    }
}
