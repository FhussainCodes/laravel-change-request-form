<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    protected $primaryKey = 'request_no';
    
    protected $fillable = [
        'request_no',
        'project_module',
        'department',
        'requested_by',
        'priority',
        'request_type',
        'change_type',
        'problem_statement',
        'decision',
        'comments',
        'assigned_to',
        'assigned_date',
        'assigned_by',
        'uat_by',
        'deployed_by',
        'version'
    ];
}
