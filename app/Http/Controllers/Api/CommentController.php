<?php

namespace App\Http\Controllers\Api\CommentController;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request) {

        $data = request()->validate([

            'author' => ['nullable', 'string', 'max:1'],
            'content' => ['string', 'max:400', 'required'],
            'project_id' => ['required', 'exists:projects,id', 'integer'],
        ]);

        // $new_comment = new Comment();
        // $new_comment->fill($data);
        // $new_comment->save();

        
        return $request->all();
    }
}
