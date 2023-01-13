<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Role;
use App\Models\Details;
use App\Models\Feedback;
use App\Contracts\Likeable;
use PHPUnit\Util\Xml\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;

    protected $fillable = [

        'email',
        'password',
        'username',
        'role_id',
        'gender',
        'first_name',
        'last_name',
        'phone',
        'age',
        'country_name',
        'card_number',
        'address1',
        'expiration_dateM',
        'expiration_dateY',
        'csc',
        'zip_code',
        'payment_id',
        'reportBug',
        'bio',
        'new_password',
        'profile_pic',

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function isAdministrator()
    {
        return $this->roles()->where('role', 'Administrator')->exists();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
   
}
