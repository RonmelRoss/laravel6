<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Reply;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        // $this->authorize('update-conversation', $reply->conversation);
        $this->authorize('update', $reply->conversation);
        $reply->conversation->setBestReply($reply);
        // $reply->conversation->save();

        return back();
    }
}
