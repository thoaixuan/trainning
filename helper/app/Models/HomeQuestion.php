<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeQuestion extends Model
{
    const TABLE='questions';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = false;
}
