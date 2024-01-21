<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $post=Post::where('post_status', '=', 'active')->get();
        $usertype= Auth()->user()->usertype;

           if ($usertype =='user'){
            return view('home.homepage',compact('post'));
           }
           else if ($usertype =='admin'){
            return view('admin.adminhome');
           }

           else 
           {
            return redirect()->back();
           }
        }

    }//index bloc end
 
    public function homepage()
    {
        $post= Post::where('post_status', '=', 'active')->get();
        return view('home.homepage',compact('post'));
    }

    public function post_details($id)
    {
        $post= Post::find($id);
        return view('home.post_details',compact('data'));
    }
    public function my_post_del($id)
    {
        $data=Post::find($id);
        $data->delete();
        //return redirect()->back();
        return redirect()->back()->with('message', 'Post Deleted successfully');
    }
   
    public function create_post()
    {
        
        return view('home.create_post');
    }

    public function my_post()
    {
        $user=Auth::user();
        $userid=$user->id; // initialized user table id to variable $userid
        $data= Post::where('user_id', '=', $userid)->get(); // post table user_id = user table id
        return view('home.my_post',compact('data'));
    }

    
    public function user_post(Request $request) // this line is useful for taking form input field name
    {   
        $user=Auth()->user();
        $userid=$user->id;
        $username=$user->name;
        $usertype=$user->usertype;
        

        $post=new post;
        $post->title= $request->title; // store title in post table 
        $post->description= $request->description; // store desc in post table 
        $post->user_id=$user->id;
        $post->name=$user->name; // from user table
        $post->usertype=$user->usertype;
        $post->post_status='Pending';

            $image=$request->image; // take image from form input field
            if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension(); // make image name unique
            $request->image->move('postimage',$imagename);
        $post->image=$imagename; // store image in post table 
            }
            $post->save();
            return redirect()->back();
    }
    
    public function my_post_update_form($id){
        $data=Post::find($id);
        return view ('home.post_page', compact('data'));
    }
    public function my_post_update_data(Request $request,$id){
        $data=Post::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $image=$request->image;
        if ($image)
        {
            $imagename= time(). '.' .$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Confirm Update');
    }
   
}

