<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    const TABLE='category';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = false;
}
