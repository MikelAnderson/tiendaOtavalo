<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class CommentsController extends Controller
{
    //
    public function store(Request $request, Product $product) {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->parent_id = $request->parent_id;
        $comment->user_id = \auth()->id();
        $comment->product_id = $request->product_id;
        $product->comments()->save($comment);
        return redirect()->back();
    }
}
