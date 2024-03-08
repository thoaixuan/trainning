<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nametask',
        'description',
        'file',
        'startdate',
        'enddate',
        'status',
        'progress',
        'userjoin',
        'userCreate',
        'userId',
    ];
}
