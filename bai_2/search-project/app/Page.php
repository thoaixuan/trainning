<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name', 'key', 'link','type_open','status','content'
    ];
}
