<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Visitor;
use Illuminate\Support\Facades\Session;

class SignUpController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        return view('front.visitor.sign-up',[
            'categories'=>$categories
        ]);
    }
    public function saveSignUp(Request $request){
        $visitor = new Visitor();
        $visitor->saveVisitorInfo($request);
        return redirect('/');
    }
    public function visitorLogin(){
        $categories = Category::where('publication_status',1)->get();
        return view('front.visitor.sign-in',[
            'categories'=>$categories
        ]);
    }
    public function visitorSignIn(Request $request){
        $visitor = Visitor::where('email_address',$request->email_address)->first();
        if($visitor){
            if (password_verify($request->password,$visitor->password)) {
                Session::put('visitor_id',$visitor->id);
                Session::put('visitor_name',$visitor->first_name.' '.$visitor->last_name);
                return redirect('/');
            } else {
                return redirect('/visitor-login')->with('message','password is invalied');
            }
        }else{
            return redirect('/visitor-login')->with('message','email address is invalied');
        }
    }
    public function visitorLogout(Request $request){
        Session::forget('visitor_id');
        Session::forget('visitor_name');
        
        return redirect('/');
    }
}
