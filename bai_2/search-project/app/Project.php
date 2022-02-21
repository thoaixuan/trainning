<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // use SoftDeletes;
    const STATUS_DRAF='draft';
    const STATUS_UNPUBLISHED = 'unpublished';
    const STATUS_PUBLISHED = 'published';
    protected $fillable = [
        'user_id', 'service_id', 'projects_name','status'
    ];

   public function user(){
    return $this->belongsTo('App\User','user_id');
}

   public function service(){
       return $this->belongsTo('App\Service','service_id');
   }
}
