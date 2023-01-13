<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Details extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [

        'gender',
        'first_name',
        'last_name',
        'phone',
        'age',
        'country_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
