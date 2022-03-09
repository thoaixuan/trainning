<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phongban extends Model
{
    protected $table = 'phongban';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'phongban_name',
        'phongban_description'
    ];
}
