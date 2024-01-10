<?php

namespace App\Http\Controllers;

use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMediMail;

class ContactMediController extends Controller
{
    public function submitForm(Request $request)
    {
         $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $formData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        $mail = new ContactMediMail($formData);
        Mail::to('medi_plus_contact@gmail.com')->send($mail);
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
