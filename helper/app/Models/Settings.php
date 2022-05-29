<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    // use HasFactory;
    const TABLE='settings';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = false;
           
}
