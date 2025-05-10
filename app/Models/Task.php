<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = [
        'workspaceId', 
        'title', 
        'description', 
        'deadline', 
        'is_active', 
        'is_delete',
        'created_date', 
        'modified_date', 
        'deleted_date',
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspaceId');
    }
}
