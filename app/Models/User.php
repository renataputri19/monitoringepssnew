<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['username', 'password', 'admin'];
    
    // Remember to hash passwords when set
    public function setPasswordAttribute($password)
    {
        if (trim($password) === '') {
            return;
        }

        $this->attributes['password'] = bcrypt($password);
    }
}
