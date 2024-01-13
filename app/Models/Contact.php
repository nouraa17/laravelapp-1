<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'name_of_table'; //to use table name without specifying it is plural or singular
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];
}
