<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['title', 'body'];

    public function setBestReply(Reply $reply)
    {
        $this->best_reply_id = $reply->id;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
