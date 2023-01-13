<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class ReportBug extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'bug_desc',
        'user_id',
        'report_id',
        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
