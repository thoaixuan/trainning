<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use SoftDeletes;
    const STATUS_DRAF='draft';
    const STATUS_UNPUBLISHED = 'unpublished';
    const STATUS_PUBLISHED = 'published';
    
     public function user(){
       return $this->belongsTo('App\User');
   }

   public function service(){
       return $this->belongsTo('App\Service');
   }
}
