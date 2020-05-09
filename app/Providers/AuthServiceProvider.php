<?php

namespace App\Providers;

use App\Conversation;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Code on next line allows guest to access page
        // Gate::define('update-conversation', function (?User $user, Conversation $conversation) {

        // There is no need to define authorization below
        // since a policy has already been created for specified model
        // Gate::define('update-conversation', function (User $user, Conversation $conversation) {
        //     return $conversation->user->is($user);
        // });

        // Setting global authorization filters
        Gate::before(function (User $user) {
            if ($user->id === 2) { // admin
                return true;
            }
        });
    }


}
