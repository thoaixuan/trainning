<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $table = 'notes';
    protected $fillable = [
        'title',
        'description',
    ];
}
