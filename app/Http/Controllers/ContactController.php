<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the Contact page.
     */
    public function index()
    {
        return view('UserPages.contact');
    }

    /**
     * Handle contact form submission.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Send email (optional - configure in .env)
        // Mail::raw($request->message, function($message) use ($request) {
        //     $message->to('mdrrmo@camalaniugan.gov.ph')
        //             ->subject('New Contact Inquiry from ' . $request->name);
        // });

        // Or save to database
        // \App\Models\Contact::create($request->all());

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}