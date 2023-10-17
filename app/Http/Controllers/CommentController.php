<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request){
        $validatedData = $request->validate([
            'id_users' => 'required|integer',
            'id_project' => 'required|integer',
            'text_cmt' => 'required',
            'name'=>'required'
        ]);
        Comment::create([
            'id_users' => $request->id_users,
            'id_project' => $request->id_project,
            'text_cmt' => $request->text_cmt,
            'name'=>$request->name,
            'like'=> 0
        ]);
        return redirect('/favourite/' . $request->id_project);

    }
    public function addReply(Request $request){
        $validatedData = $request->validate([
            'id_users' => 'required|integer',
            'id_cmt' => 'required|integer',
            'text_cmt' => 'required',
            'name'=>'required'
        ]);
        Reply::create([
            'id_users' => $request->id_users,
            'id_cmt' => $request->id_cmt,
            'text_cmt' => $request->text_cmt,
            'name'=>$request->name,
            'like'=> 0
        ]);
        return redirect('/favourite/' . $request->id_project);
    }
}
