<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    const TABLE='rooms';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = true;
}
