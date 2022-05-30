<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScrapCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'slug',
        'image',
        'description',
    ];

    public function handicrafts()
    {
        return $this->hasMany(Handicraft::class);
    }
}
