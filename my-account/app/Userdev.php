<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdev extends Model
{
    protected $table = 'userdev';
    protected $primaryKey = 'id';

    protected $fillable = [
        'phongban_name',
        'phongban_description',
    ];
}
