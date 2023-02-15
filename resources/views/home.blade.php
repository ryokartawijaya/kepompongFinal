@auth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Student</title>

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
            <p style="color:white; font-weight: bold; font-size: 15px; margin-top: -25px; margin-left: 130px;" class="unselectable">Student</p>
        </li>
        <li>
            <a href="{{url('home-student')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{url('forum')}}">Forum</a>
        </li>
        <li>
            <a href="{{url('modules')}}">Modul</a>
        </li>
        <li>
            <a href="{{url('course')}}">Course</a>
        </li>


        <li style="margin-top: 350px;">
            <a href="{{url('profile')}}"><img src="myAssets/profileWhite.png" alt="Logout" style="width:30px; "> Profile</a>
        </li>
        <li>
            <a  href="{{ route('logout') }}"><img src="myAssets/logout.png" alt="Logout" style="width:30px; "> Log Out</a>
        </li>

    </ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <!-- <div class="row">
            <div class="col-lg-12">
                <h1>Simple Sidebar</h1>
                <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
            </div>
        </div> -->
        <div class="row text-center" id="box">
            <div class="" style="background-color: white; width: 800px; margin-right: 10px; height: 650px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px;">Class Schedule</h3>
                <br><br>

                <div class="scheduleWrap" style=" height: 500px; overflow: hidden; background: linear-gradient(to top, #999 0, #ffffff 30px, #ffffff 100%); overflow: scroll;">



                    <table class="table">

                        <thead>
                                            <tr>
                                            <th scope="col">Date & TIme</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Teacher</th>
                                            <th scope="col">Action</th>
                                            <!-- <th scope="col">Description</th> -->
                                            </tr>
                        </thead>

                        <tbody>
                            @foreach($schedule as $data)
                                <tr>
                                <td>
                                    <p>{{$data->date}} [{{$data->time}}]</p>
                                </td>
                                <td>
                                    <p>{{$data->title}}</p>
                                </td>
                                <td>
                                    <p>{{$data->teacher}}</p>
                                </td>
                                <td>
                                    <a href="{{$data->link}}"><p>Join</p></a>
                                </td>



                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>

                <p id="time" style="color: #8816e1"></p>
            </div>


            <div class="" style="margin-top: 50px;background-color: white; width: 800px; margin-right: 10px; height: 650px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px;">Past Class Schedule</h3>
                <br><br>

                <div class="scheduleWrap" style=" height: 500px; overflow: hidden; background: linear-gradient(to top, #999 0, #ffffff 30px, #ffffff 100%); overflow: scroll;">



                    <table class="table">

                        <thead>
                                            <tr>
                                            <th scope="col">Date & TIme</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Teacher</th>
                                            <!-- <th scope="col">Action</th> -->
                                            <!-- <th scope="col">Description</th> -->
                                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pastSchedule as $data)
                                <tr>
                                <td>
                                    <p>{{$data->date}} [{{$data->time}}]</p>
                                </td>
                                <td>
                                    <p>{{$data->title}}</p>
                                </td>
                                <td>
                                    <p>{{$data->teacher}}</p>
                                </td>
                                <!-- <td>
                                    <a href="{{$data->link}}"><p>Join</p></a>
                                </td> -->



                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>

                <p id="time" style="color: #8816e1"></p>
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
