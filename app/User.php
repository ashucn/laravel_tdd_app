<?php

namespace App;

use App\Models\Event;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'lat',
        'long',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function participantEvents()
    {
        return $this->belongsToMany('App\Models\Event', 'participants', 'user_id', 'event_id');
    }

    // helper: file
    public function removeCurrentProfilePic($user)
    {
        if ($user->avatar != '') {
            $url = $user->avatar;
            $fileName = explode('/', $url);
            $fileName = $fileName[count($fileName) - 1];
            if (file_exists(public_path('uploads/avatar/') . $fileName)) {
                unlink(public_path('uploads/avatar/') . $fileName);
            }
        }
    }
}
