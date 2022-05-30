<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use HasFactory;

    protected $with = ['user'];

    protected $fillable = ['user_id', 'rating', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
