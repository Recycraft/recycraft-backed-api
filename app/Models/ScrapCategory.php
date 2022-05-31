<?php

namespace App\Models;

use App\Enums\ScrapType;
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
        'desc',
        'type'
    ];

    protected $casts = [
        'type' => ScrapType::class
    ];

    public function handicrafts()
    {
        return $this->hasMany(Handicraft::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
