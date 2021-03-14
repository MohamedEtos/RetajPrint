<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerData extends Model
{
    use HasFactory;
    protected $table = 'CustomerData'; //name of table database
    protected $fillable = [
        'cname',
        'meter',
        'EMP'
    ];
}
