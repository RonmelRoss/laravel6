<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        return view('conversations.index', [
            'conversations' => Conversation::all()
        ]);
    }

    public function show(Conversation $conversation)
    {
        //dd($conversation);
        
        return view('conversations.show', [
            'conversation' => $conversation
        ]);
    }
}
