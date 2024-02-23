<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function destroy(Comment $comment) {
        //salviamo il progetto legato a quel commento
        $project = $comment->project;
        //cancelliamo il commento
        $comment->delete();
        //rindirizziamo alla pagina di show
        return redirect()->route('admin.projects.show', $project);
    }
}
