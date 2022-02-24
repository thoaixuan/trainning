<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function user_fk()
    {
        return $this->hasMany('App\User');
    }

}
