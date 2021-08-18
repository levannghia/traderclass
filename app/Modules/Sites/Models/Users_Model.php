<?php

namespace App\Modules\Sites\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users_Model extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = "users";

    public function scopeGetAll($query)
    {
        return $query->whereIn("status", [0, 1]);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
