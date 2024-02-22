<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Project;

class Comment extends Model
{
    use HasFactory;

    //cardinalità il commento appartiene a un progetto
    public function project() {
        return $this->belongsTo(Project::class);
    }
}
