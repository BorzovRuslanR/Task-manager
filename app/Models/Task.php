<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function coments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Coment::class, 'task_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    protected $attributes = [
        'image' => 'default.jpg',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
