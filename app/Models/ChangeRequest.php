<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    protected $fillable = [
        "request_no",
        "project_module",
        "department",
        "requested_by",
        "priority",
        "problem_statement",
        "decision",
        "comments",
        "request_type",
        "change_type",
        "assigned_to",
        "assigned_date",
        "assigned_by",
        "uat_by",
        "deployed_by",
        "version"
    ];
}
