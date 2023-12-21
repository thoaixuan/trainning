<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    const TABLE='pages';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    // public $timestamps = false;
}
