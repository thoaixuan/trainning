<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    const TABLE='settings';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = false;
}
