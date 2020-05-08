<?php

namespace App\Http\Controllers;

use App\Notifications\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function notify()
    {
        // return 'notified';

        request()->user()->notify(new SendNotification(900));

        // below code is better when you're referring to collection of users
        // Notification::send(request()->user(), new SendNotification());
        
        return redirect('/home')
        ->with('notify','Notification Sent!');
    }
}
