<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function show()
    {
        // $notifications = auth()->user()->unreadNotifications;

        // $notifications->markAsRead();

        $notifications = tap(auth()->user()->unreadNotifications)->markAsRead();

        return view('notifications.view', [
            'notifications' => $notifications
        ]);
    }

    public function store()
    {
        ProductPurchased::dispatch('toy');
        // event(new ProductPurchased('toy'));        
    }
}
