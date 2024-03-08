<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'status',
        'userId',
        'userName',
    ];
}
