<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Project extends Model
{
    use HasFactory;
    
    protected $guarded = ['slug', 'project_img', 'technologies'];
    
    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    //cardinalità a un progetto ha più commenti
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
