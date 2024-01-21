<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\support\facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user= Auth()->user(); // user is table name
        // we have id, name, usertype in the user table
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;
        
        $post= new Post;
        $post->title = $request->title;
        $post->description = $request->description;
       
        $post->post_status = 'active';
        
        
        $post->user_id= $userid; // user table id userid initilized to user_id of post table field
        $post->name=$name; // coming from user table
        $post->usertype= $usertype;

        // save image to folder postimage
        $image= $request->image;
        if($image){
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('postimage',$imagename); 
        
         $post->image = $imagename; // store image to db table

        }
        $post->save();
        return redirect()->back()->with ('message', 'post added successfully');

    }

         public function show_post()
         {
           $data= Post :: all();
           // $data= Post :: find(id);
            return view('admin.show_post', compact('data'));
         }

         public function delete_post($id)
         {
            $data= Post :: find($id);
            $data->delete();

            return redirect()->back()->with ('message','Post Deleted Successfully');

         }

         public function edit_page($id)
         {
            $data= Post :: find($id);
           

            return view ('admin.edit_page', compact('data'));

         }

         public function update_post(Request $request,$id){
            $data= Post::find($id);
            $data->title= $request->title;
            $data->description= $request->description;
            $browseimage=$request->image;
            if($browseimage){
                $imagename=time().'.'.$browseimage->getClientOriginalExtension();
                $request->image->move('postimage',$imagename); 
               
                $data->image = $imagename; // store image to db table
       

            }
            $data->save();
            return redirect()->back()->with('message','Post updates successfully');


         }

         public function accept_status($id){
            $data= Post::find($id);
            $data->post_status= 'active'; // change to db table field
            $data->save();
            return redirect()->back()->with('message','Post status change to active');

         }
         public function reject_status($id){
            $data= Post::find($id);
            $data->post_status= 'inactive'; // change to db table field
            $data->save();
            return redirect()->back()->with('message','Post status change to inactive/rejected');

         }

}
