<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'per_name',
        'permissions'
    ];
}
