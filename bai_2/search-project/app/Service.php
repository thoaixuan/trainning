<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id', 'service_name', 'service_description'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public $timestamps=false;
    
}
