<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Store contact form submission
    public function store(Request $request)
    {
        Contact::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'message'   => $request->message,
        ]);

        return back()->with('success', 'Message sent successfully!');
    }

    // Show messages in admin panel
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts', compact('contacts'));
    }
}
