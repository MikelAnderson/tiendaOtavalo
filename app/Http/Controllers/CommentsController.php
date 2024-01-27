<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    //
    public function newComment(Request $request) {
        $comment =  new Comment(array(
            'product_id' => $request->get('product_id'),
            'content' => $request->get('content'),
        ));
        $comment->save();
        return redirect()->back()->with('status', 'comentario creado');
    }
}
