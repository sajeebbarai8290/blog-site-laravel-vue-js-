<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coment;
use DB;

class CommentController extends Controller
{
    public function newComment(Request $request){
        $comment = new Coment();
        $comment->visitor_id  = $request->visitor_id;
        $comment->blog_id  = $request->blog_id;
        $comment->comment  = $request->comment;
        $comment->save();
        
        return redirect('/blog/blog-details/'.$request->blog_id)->with('message','your comment post successfully');
    }
    public function manageComment(){
        $comments   = DB::table('coments')
                        ->join('visitors', 'coments.visitor_id','=','visitors.id')
                        ->join('blogs','coments.blog_id','=','blogs.id')
                        ->select('coments.*','visitors.first_name','visitors.last_name','blogs.blog_title')
                        ->orderBy('coments.id','desc')
                        ->get();
        
        return view('admin.comment.manage-comment',['comments' =>$comments]);
    }
    public function unpublishedComment($id){
        $comment = Coment::find($id);
        $comment->publication_status = 0;
        $comment->save();
        return redirect('/manage-comment');
    }
    public function publishedComment($id){
        $comment = Coment::find($id);
        $comment->publication_status = 1;
        $comment->save();
        return redirect('/manage-comment');
    }
}
