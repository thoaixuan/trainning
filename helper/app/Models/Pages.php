<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pages extends Model
{
    use Sluggable;
    const TABLE='pages';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = false;
    

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'content', 'slug'
    ];
}
