<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
   <style type="text/css">
    label{
        display: inline-block;
        width: 200px;
        color:white;
        font-size:18px;
        font-weight:bold;
    }
     
    .div_deg{
      
        text-align: center;
        padding:5px;

    }
    .title_deg{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding:10px;
        color:white;
    }

    .input_deg{
        padding:5px;
    }
    .div_deg{
        text-align:center;
        background:black;
    }

    .img_deg{
        height: 200px;
        width : 240px;
        margin: auto;
    }
    
   </style>
  @include ('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.headerpage')
         <!-- banner section start -->
     
  
      <div class="div_deg">
      @if(session()->has('message'))
        <div class= "alert alert-success">
         <button type="button" class="close" data-dismiss= "alert" aria-hidden="true">X </button>
         {{session()->get('message')}}
        </div>
        @endif  
        
        <h3  class= "title_deg">Update Post</h3>
         <form action="{{url('my_post_update_data',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="input_deg" >
          <label>Post Title:</label><br>
         <input type="text"  name="title" value="{{$data->title}}"><br>
         </div>
        
         <div class="input_deg">
         <label >Post Description:</label><br>
         <textarea name="description"  cols="30" rows="5">{{$data->description}}</textarea><br><br>
         </div>
    
            <div class="input_deg">
            <label >Current Image:</label><br>
           <img class="img_deg" src="/postimage/{{$data->image}}" alt="">
         </div>
       
         <div class="finput_deg">
         <label > Change Current Image:</label><br>
          <input type="file" name="image">
         </div> 

         <div class="input_deg">
         <input type="submit" class="btn btn-primary" value="submit">
         </div>
      
        </form> 
     
      </div>
      </div>
   
      <!-- footer section start -->
       @include('home.footer') 
   </body>
</html>