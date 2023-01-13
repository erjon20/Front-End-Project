<?php

namespace App\Models;

use App\Models\Like;
use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'path_name',
        'image_title',
        'year',
        'resolution',
        'stock',
        'price',
        'image_description',
        'author',
        'category_id',

    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
