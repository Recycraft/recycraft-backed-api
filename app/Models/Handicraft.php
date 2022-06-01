<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Handicraft extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'scrap_category_id',
        'title',
        'image',
        'desc',
        'materials',
        'process'
    ];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(ScrapCategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
