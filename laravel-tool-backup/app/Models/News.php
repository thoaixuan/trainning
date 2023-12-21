<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'title', 'image', 'summary','content','category_id','created_at'
    ];
        
    public function categories(){
        return $this->belongsTo('App\Models\CategoryNews','category_id');
    }
}
