<!DOCTYPE html>
<html>
  <head> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
  @include('admin.css')
   <style type="text/css">
    .title_deg{

        text-align : center;
        color : white;
        font-size : 20px;
        font-weight : bold;
        padding : 30px;

    }
    .table_deg {
    border: 1px solid white;
    width : 80%;
    text-align: center;
    margin-left: 70px;
                }
    .th_deg{
        background-color: skyblue;
    }

    .image_deg{
        height : 60px;
        width: 60px;
        padding: 5px;
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
    <center>

        @if(session()->has('message'))
        <div class= "alert alert-success">
         <button type="button" class="close" data-dismiss= "alert" aria-hidden="true">X </button>
         {{session()->get('message')}}
        </div>
        @endif

    <h1 class="title_deg">Show Post</h1>
    

    <table class="table_deg">
        <tr class="th_deg">
            <th>Post Title</th>
            <th>Description</th>
            <th>Post By</th>
            <th>Post Status</th>
            <th>UserType</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Status Active</th>
            <th>Status Reject</th>
        </tr>

        @foreach($data as $data)
            <tr>
            <td>{{$data->title}}</td>
                
            <td>{{$data->description}}</td>
            
            <td>{{$data->name}}</td>
            
            <td>{{$data->post_status}}</td>
           
            <td>{{$data->usertype}}</td>
                               
            <td>
            <img class="image_deg" src="postimage/{{$data->image}}" >
            </td>

            <td>

            <!-- <a href="{{url('delete_post',$data->id)}}" class="btn btn-danger" onclick= "return confirm('Are you sure to Delete this?')">Delete</a> -->

            <a href="{{url('delete_post',$data->id)}}" class="btn btn-danger" onclick="confirmation('event')">Delete</a>
            </td>

            <td>
            <a href="{{url('edit_page',$data->id)}}" class="btn btn-success">Edit</a>
            </td>

            <td>
            <a onclick= "return confirm('Are you sure to change post status active?')" href="{{url('accept_status',$data->id)}}" class="btn btn-outline-secondary">Accept</a>
            </td>

            <td>
            <a onclick= "return confirm('Are you sure to change post status rejected?')" href="{{url('reject_status',$data->id)}}" class="btn btn-primary">Reject</a>
            </td>
            </tr>

          @endforeach  
    </table>
    </div>
    </center>
  @include('admin.footer')

  <script type="text/javascript">
    function confirmation(ev)
    {
        ev.preventDefault();
        var urlToRedirect=ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
            title : "Are you sure to delete this?",
            text : "You won't be able to revert this delete",
            icon : "warning",
            buttons : true,
            dangerMode : true,
        })
        .then((willCancel)=>
        {
            if(willCancel){
                window.location.href=urlToRedirect;
            }
        });

    }

  </script>
  </body>
</html>