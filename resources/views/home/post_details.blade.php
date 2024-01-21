<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
     @include ('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.headerpage')
      </div>
      <!-- header section end -->
     
      <div style="text-align:center;" class="col-md-12">
                     <div><img src="/postimage/{{$post->image}}" style= "padding: 20px; margin-bottom:20px; height:400px; width=550px; margin:auto;" ></div>
                     <h3><b>{{$post->title}}</b></h3>
                     <h4>{{$post->description}}</h4>
                     <p>Posted by <b>{{$post->name}}</b></p>
                     
        </div>
     
      <!-- footer section start -->
       @include('home.footer') 
   </body>
</html>