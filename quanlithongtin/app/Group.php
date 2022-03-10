<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'group_name',
        'phongban_id',
        'position_id',
        'user_id'
    ];

}
