<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request) {

        $request->validate([

            'author' => ['nullable', 'string', 'max:98'],
            'content' => ['string', 'max:400', 'required'],
            'project_id' => ['required', 'exists:projects,id', 'integer'],
            
        ]);

        $new_comment = new Comment();
        $new_comment->fill($request->all());
        $new_comment->save();
       
        return $new_comment;
 
    }
}
