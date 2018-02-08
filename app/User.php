<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const USER_VERIFIED = '1';
    const USER_UNVERIFIED = '0';

    const USER_ADMIN = '1';
    const USER_AGENT = '2';
    const USER_REGULAR = '3';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'verified',
        'verification_token',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    public static function generateVerificationToken()
    {
        return str_random(40);
    }

    public function isAdmin()
    {
        return $this->type == User::USER_ADMIN;
    }
}
