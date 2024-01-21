<!DOCTYPE html>
<html lang="en">
   <head>
 
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

    .field_deg{
        padding:5px;
    }
   </style>
    @include ('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.headerpage')
        
      
      <div class = "div_deg">
        <h3  class= "title_deg">Add Post</h3>
         <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="field_deg" >
          <label>Post Title:</label><br>
         <input type="text"  name="title"><br>
         </div>
        
         <div class="field_deg">
         <label >Post Description:</label><br>
         <textarea name="description"  cols="30" rows="5"></textarea><br><br>
         </div>
    
            <div class="field_deg">
            <label >Add Image:</label><br>
            <input type="file"  name="image"><br>
         </div>
       
         <div class="field_deg">
         <input type="submit" class="btn btn-outline-secondary" value="Add Post">
         </div>
      
        </form> 
        </div>


     
      <!-- footer section start -->
       @include('home.footer') 
   </body>
</html>