<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
         'service_name', 'service_description'
    ];

    public function user(){
        return $this->belongsToMany('App\User','user_id');
    }

    public $timestamps=false;
    
}
