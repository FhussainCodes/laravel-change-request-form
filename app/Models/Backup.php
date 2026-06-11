<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Backup extends Model
{
        use HasFactory;

    // Defines the database columns that can be filled by our form
    protected $fillable = [
        'backup_type',
        'backup_datetime',
        'image', 
        'created_by',
    ];
}
