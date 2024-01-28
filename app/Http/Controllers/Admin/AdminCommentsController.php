<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use PHP_CodeSniffer\Util\Common;

class AdminCommentsController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Comments - Online Store";
        $viewData["comments"] = Comment::all();
        return view('admin.comments.index')->with("viewData", $viewData);
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Comment - Online Store";
        $viewData["comments"] = Comment::findOrFail($id);
        return view('admin.comments.edit')->with("viewData", $viewData);
    }

    public function delete($id)
    {
        Comment::destroy($id);
        return back();
    }

    public function update(Request $request, $id)
    {

        $comment = Comment::findOrFail($id);
        $comment->SetPosted($request->input('posted'));
        $comment->save();
        return redirect()->route('admin.comments.index');
    }
}
