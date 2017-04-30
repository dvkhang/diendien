<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable 
{
    use Notifiable;
    use EntrustUserTrait;

    protected $table = 'users';
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

    public function order(){
        return $this->hasMany('App\Order', 'user_id');
    }


    public function isAdmin()
    {
        if (Auth::user()->email == 'admin@admin.com') {
            # code...
            return true; // this looks for an admin column in your users table
        }
        return false;
        
    }
}
