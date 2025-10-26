<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Handle contact form submission
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save to database
        $contact = Contact::create($validated);

        // Send email (optional - uncomment if email is configured)
        // Mail::send('emails.contact', $validated, function ($message) use ($validated) {
        //     $message->to('support@example.com')
        //             ->subject('New Contact Message: ' . $validated['subject'])
        //             ->replyTo($validated['email'], $validated['name']);
        // });

        return back()->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan menghubungi Anda dalam 24 jam.');
    }
}
