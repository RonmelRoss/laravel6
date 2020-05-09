<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    // This function will fire before the authorization ability is tested
    public function before(User $user)
    {
        // !!! It is important not to return anything in this method
        // if the condition is false
        // i.e. return $user->id === 2
        // instead of condition below. Returning any value causese the rest
        // of the function NOT to be called. Keep that in mind!
        if ($user->id === 2) { //admin
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }
}
