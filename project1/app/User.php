<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders ()
    {
        return $this->hasMany('App\Order');
    }
    public function role ()
    {
        return $this->belongsTo('App\Role');
    }
    public function reviews ()
    {
        return $this->hasMany('App\Review');
    }

    public function scopeStoreUser($query, $user)
    {
        $user = User::create([
            'name' => $user->get('name'),
            'password' => Hash::make($user->get('password')),
            'address' => $user->get('address'),
            'email' => $user->get('email'),
            'phone' => $user->get('phone'),
            'role_id' => $user->get('role'),
        ]);

        return $user;
    }
}
