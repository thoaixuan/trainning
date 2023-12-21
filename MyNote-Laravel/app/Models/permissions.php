<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissions extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'per_name',
        'permissions'
    ];
}
