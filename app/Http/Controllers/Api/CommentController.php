<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewComment;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
       
        //invio mail/notifica a qualcuno
        Mail::to("info@portfolio_key.com")->send(new NewComment($new_comment));

        return $new_comment;
 
    }
}
