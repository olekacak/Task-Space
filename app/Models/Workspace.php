<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $table = 'workspace'; // because it's not plural

    protected $fillable = [
        'name', 
        'userId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'workspaceId');
    }
}
