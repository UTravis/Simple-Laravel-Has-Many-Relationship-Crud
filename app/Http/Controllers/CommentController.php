<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function showCreateForm( $update = null )
    {
        $updateStatus = $update;
        return view('pages.create', compact('updateStatus'));
    }

    public function createComment(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:150'
        ]);

        $user = User::findOrFail(1);
        $comment = new Comment([ 'comment' => $request->comment ]); 
        $user->comment()->save($comment);
        
        $request->session()->put('status', 'Comment was submited successfully');

        return redirect('/create');
    }

    public function showComments()
    {
        $comments = Comment::all();
        return view('pages.comments', compact('comments'));
    }

    public function delete(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        $request->session()->put('status', 'Comment was deleted successfully');
        return redirect('/comments');
    }

    public function showUpdateForm( $update = null, $updateId)
    {
        // $request->session()->put('status', 'Update Form');
        $updateStatus = $update;
        $comment = Comment::findOrFail($updateId);
        return view('pages.create', compact('comment', 'updateStatus'));
    }

    public function update( Request $request, $id )
    {
        $comment = Comment::findOrFail($id);
        $comment->update([
            'comment' => $request->comment
        ]);

        $request->session()->put('status', 'Comment was update successfully');

        return redirect('/comments');
    }


}
