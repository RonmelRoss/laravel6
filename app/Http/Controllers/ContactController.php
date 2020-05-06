<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        //$email = request('email');
        //dd($email);

        // Mail::raw('It works!', function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to(request('email'));
        //     $message->subject('Subject');
        // });

        Mail::to(request('email'))
            ->send(new ContactMe('Football'));

        return redirect('/contact')
            ->with('message','Email Sent!');
    }
}