<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    // use HasFactory;
    const TABLE='contacts';
    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    public $timestamps = true;
           
    protected $fillable = [
       'id' ,'contact_name','contact_phone', 'contact_content', 'contact_email'
    ];
}
