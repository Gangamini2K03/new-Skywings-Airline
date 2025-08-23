<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required','string','max:255'],
            'email'     => ['required','email'],
            'subject'   => ['required','string','max:255'],
            'message'   => ['required','string','max:5000'],
        ]);

        // TODO: save to DB or send email
        // Contact::create([...]);

        return back()->with('success', 'Thanks! Your message has been sent.');
    }

    // If you use admin.contacts route, add:
    // public function index() { ... }
}
