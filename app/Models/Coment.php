<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;
    public function tasks()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
