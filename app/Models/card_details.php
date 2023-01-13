<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card_details extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [

        'card_number',
        'address1',
        'expiration_dateM',
        'expiration_dateY',
        'csc',
        'zip_code',
        'payment_type',
        'payment_id',
        'user_id',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
