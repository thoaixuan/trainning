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
    public $timestamps = true;
           
    protected $fillable = [
       'id' ,'mail_driver','mail_host', 'mail_port', 'mail_from_address','mail_from_name','mail_encryption','mail_username','mail_password','mail_receive'
    ];
}
