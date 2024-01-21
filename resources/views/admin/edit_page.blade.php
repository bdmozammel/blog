<!DOCTYPE html>
<html>
  <head> 
  <base href="/public">
  @include('admin.css')
  <style type="text/css">
    label{
        display: inline-block;
        width: 200px;
    }
    .post_title{

        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding:30px;
        color:white;
    }
    .div_center{
        text-align: center;
        padding:20px;

    }
   </style>


  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
  @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      @if(session()->has('message'))
        <div class= "alert alert-success">
         <button type="button" class="close" data-dismiss= "alert" aria-hidden="true">X </button>
         {{session()->get('message')}}
        </div>
        @endif
      <h1 class="post_title">Update Post</h1>
      <form action="{{url('update_post', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="div_center">
          <label>Post Title:</label><br>
         <input type="text"  name="title" value="{{$data->title}}"><br>
         </div>
        
         <div class="div_center">
         <label >Post Description:</label><br>
         <textarea name="description"  cols="30" rows="10"> {{$data->description}}</textarea><br><br>
         </div>
    
         <div class="div_center">
            <label > Old Image:</label>
           <img style="margin:auto;" height="150px" width = "100px" src="/postimage/{{$data->image}}" >
         </div>

         <div class="div_center">
            <label >Update Old Image:</label>
            <input type="file"  name="image"><br>
         </div>
       
         <div class="div_center">
         <input type="submit" class="btn btn-primary" value="Update">
         </div>
      
        </form> 

    </div>
  
  @include('admin.footer')
  </body>
</html>