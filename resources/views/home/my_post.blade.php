<!DOCTYPE html>
<html lang="en">
   <head>
   @include ('home.homecss')
   <style type="text/css">
    .post_deg{
        text-align:center;
        padding: 30px;
        background-color:black;
    }
    .title_deg{
        font-size: 30px;
        font-weight: bold;
        padding:15px;
        color:whitesmoke;
    }

    .desc_deg{
        font-size: 18px;
        font-weight: bold;
        padding:15px;
        color:white;
    }

    .img_deg{
        height:200px;
        width:300px;
        padding:30px;
        margin:auto;
    }
   
    </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.headerpage')       
        
        @if(session()->has('message'))
        <div class= "alert alert-success">
         <button type="button" class="close" data-dismiss= "alert" aria-hidden="true">X </button>
         {{session()->get('message')}}
        </div>
        @endif  
       
        @foreach ($data as $data)
            <div class="post_deg">            
                <img class="img_deg" src="/postimage/{{$data->image}}" >
                <h3 class="title_deg">{{$data->title}}</h3>
                <p class="desc_deg">{{$data->description}}</p>
                <a onclick="return confirm('Are you sure you want to delete this?')" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>

                <a href="{{url('my_post_update_form',$data->id)}}" class="btn btn-success">Update</a>
              
            </div>
        @endforeach
             
    
    </div>
       
      <!-- footer section start -->
       @include('home.footer') 
   </body>
</html>