<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Route notifications for the Nexmo channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForNexmo($notification)
    {
        //return $this->phone_number;
        return '639773784282';
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }

        // $this->roles()->save($role);
        // Replaced code above with the sync method below
        // sync() replaces all of the existing records in the pivot table
        // with the collection specified.
        // Second parameter specifies whether to drop new record or
        $this->roles()->sync($role, false);
    }

    public function abilities()
    {
        return $this->roles
            ->map
            ->abilities
            ->flatten()
            ->pluck('name')
            ->unique();
    }
}
