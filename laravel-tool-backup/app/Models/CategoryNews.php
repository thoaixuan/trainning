<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    const TABLE='category_news';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = true;
           
    public function cats()
    {
        return $this->hasMany(CategoryNews::class,'category_id');
    }
    public function childrenCategories(){
        return $this->hasMany(CategoryNews::class,'category_id')->with('cats');
    }
    public function news(){
        return $this->hasmany('App\Models\News');
    }
    public function parent_cats(){
        return $this->belongsTo(CategoryNews::class,'category_id');
    }
}
