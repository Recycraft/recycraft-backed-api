<?php

namespace App\Models;

use App\Models\ScrapCategory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Handicraft extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'scrap_category_id',
        'title',
        'slug',
        'image',
        'desc',
        'materials',
        'process'
    ];

    protected $with = ['scrap_category'];

    public function scrap_category()
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
