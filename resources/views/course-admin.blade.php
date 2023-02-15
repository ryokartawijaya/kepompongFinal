@auth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course | Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="myCSS/home-teacher.css">
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
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

    <div class="row text-center" id="box">
            <div class="scheduleBox" style="background-color: white; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1">Course List</h3>
                <br><br>

                <table class="table">

                        <thead>
                                            <tr>
                                            <th scope="col">Course ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Teacher</th>
                                            <th scope="col">Action</th>

                                            </tr>
                        </thead>

                        <tbody>
                            @foreach($courseData as $data)
                                <tr>
                                <td>
                                    <p>{{$data->courseId}}</p>
                                </td>
                                <td>
                                    <p>{{$data->name}}</p>
                                </td>
                                <td style="width: 400px;">
                                    <p>{{$data->description}}</p>
                                </td>
                                <td>
                                    <p>{{$data->teacher}}</p>
                                </td>
                                <td>
                                    <a href="{!! route('courses.destroy', ['courseId'=>$data->courseId]) !!}" onclick=" return confirm('Are you sure?');" ><p>Delete</p></a>
                                </td>


                                </tr>

                            @endforeach
                        </tbody>
                    </table>






            </div>

        </div>





    </div>
    <a href="{{url('uploadcourse')}}"><input type="button" class="Btn" style="position: absolute; left: 520px;"  value="Add Course" style="font-weight: bold;"></a>
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



