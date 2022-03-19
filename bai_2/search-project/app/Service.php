<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
<<<<<<< Updated upstream
         'service_name', 'service_description'
    ];

    // public function user(){
    //     return $this->belongsToMany('App\User','user_id');
    // }
=======
      'service_name', 'service_description'
    ];

>>>>>>> Stashed changes

    public $timestamps=false;
    
}
