<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMediMail;



class ContactMediController extends Controller
{

    private $columns = [
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];

    public function submitForm(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        // $formData = [
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'phone' => $request->input('phone'),
        //     'subject' => $request->input('subject'),
        //     'message' => $request->input('message'),
        // ];
        $formData = $request->only($this->columns);
        Contact::create($formData);
        $mail = new ContactMediMail($formData);
        Mail::to('medi_plus_contact@gmail.com')->send($mail);
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    //https://ahmedshaltout.com/laravel/how-to-send-emails-in-laravel-10-quick-guide/
}
