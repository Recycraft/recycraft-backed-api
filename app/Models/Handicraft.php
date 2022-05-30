<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Handicraft extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'scrap_category_id',
        'name',
        'image',
        'desc',
    ];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(ScrapCategory::class);
    }

}
