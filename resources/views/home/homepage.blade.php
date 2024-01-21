<!DOCTYPE html>
<html lang="en">
   <head>
  @include ('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.headerpage')
         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      @include('home.services')
      <!-- services section end -->
      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->
      <!-- blog section start -->
     
      <!-- footer section start -->
       @include('home.footer') 
   </body>
</html>