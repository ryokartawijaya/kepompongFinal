@auth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules | Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
    <link rel="stylesheet" href="myCSS/home-teacher.css">
</head>
<body>
<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">

    <ul class="sidebar-nav">
        <li class="sidebar-brand" style="margin-top: 30px; margin-bottom: 30px;">
            <a href="#">
            <img src="myAssets/kepompongLogoNew.png" alt="kepompong" style="width:200px; ">

            </a>
            <p style="color:white; font-weight: bold; font-size: 15px; margin-top: -25px; margin-left: 130px;" class="unselectable">Admin</p>
        </li>
        <li>
            <a href="{{url('home-admin')}}">User</a>
        </li>
        <li>
            <a href="{{url('schedule-admin')}}">Schedule</a>
        </li>
        <li>
            <a href="{{url('forum')}}">Forum</a>
        </li>
        <li>
            <a href="{{url('modules-admin')}}">Modul</a>
        </li>
        <li>
            <a href="{{url('course-admin')}}">Course</a>
        </li>

        <li>
            <a  href="{{ route('logout') }}">Log Out</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">

    <div class="row text-start">

                        <div class="">
                            <!-- image display -->
                            <h3>General Modules</h3><hr>

                            <div class="modulesBox" style="background-color: white; border-radius: 20px;padding: 10px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Video</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($imageData as $data)
                                        <tr>
                                        <td>
                                            <a href="video-admin?videoId={{$data->id}}"><img src="{{ url('uploadedImage/'.$data->image) }}" style="height: 180px; width: 320px; border-radius: 20px;"></a>
                                        </td>
                                        <td><a href="video-admin?videoId={{$data->id}}" style="color:black; text-decoration:none; font-weight: bold;"><p>{{$data->title}}</p></a></td>
                                        <td><p>{{$data->description}}</p></td>
                                        <td>
                                            <a href="{!! route('modules.destroy', ['id'=>$data->id]) !!}" onclick=" return confirm('Are you sure?');" ><p>Delete</p></a>
                                        </td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

</script>
</body>
</html>


@endauth

@guest
<?php
    // return redirect()->route('login');
    header("Location: login");
    die();
?>
@endguest

