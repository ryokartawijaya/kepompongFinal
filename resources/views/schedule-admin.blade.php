@auth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule | Admin</title>

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
    <p>Hi <?php echo Session::get('category'); ?></p>
   

        <div class="row text-center" id="box">
            <div class="col-md-6" style="background-color: white; width: 500px;margin-top: 20px; margin-right: 20px; height: 700px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px; text-align:center;">Schedule class A</h3>
                <br><br>
                <div class="scheduleWrap" style=" height: 550px; overflow: hidden; background: linear-gradient(to top, #999 0, #ffffff 30px, #ffffff 100%); overflow: scroll;">
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
                            @foreach($scheduleA as $data)
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
                                    <a href="{!! route('schedules.destroy', ['meetingID'=>$data->meetingID]) !!}" onclick=" return confirm('Are you sure?');" ><p>Delete</p></a>
                                </td>



                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>

                <p id="time" style="color: #8816e1"></p>

                <!-- <a href="{{url('register')}}"><input type="button" class="Btn" value="Add Schedule" style="font-weight: bold;"></a> -->
                <br><br>
            </div>



            <!-- box ke 2 std-->

            <div class="col-md-6" style="background-color: white; width: 500px; margin-right: 10px; margin-top: 20px; height: 700px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px; text-align:center;">Schedule class B</h3>
                <br><br>
                <div class="scheduleWrap" style=" height: 550px; overflow: hidden; background: linear-gradient(to top, #999 0, #ffffff 30px, #ffffff 100%); overflow: scroll;">
                    <table class="table">

                        <thead>
                            <tr>
                            <th scope="col">Date & TIme</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Teacher</th>

                            <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($scheduleB as $data)
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
                                    <a href="{!! route('schedules.destroy', ['meetingID'=>$data->meetingID]) !!}" onclick=" return confirm('Are you sure?');" ><p>Delete</p></a>
                                </td>



                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>

                <p id="time" style="color: #8816e1"></p>

                <!-- <a href="{{url('register')}}"><input type="button" class="Btn" value="Add Schedule" style="font-weight: bold;"></a> -->
                <br><br>
            </div>

            <a href="{{url('uploadschedule')}}"><input type="button" class="Btn" style="position: absolute; left: 520px;"  value="Add Schedule" style="font-weight: bold;"></a>


        </div>


        <!-- PAST SCHEDULE ROW   -->
        <div class="row text-center" id="box" style="margin-top: 200px;">
            <div class="col-md-6" style="background-color: white; width: 500px;margin-top: 20px; margin-right: 20px; height: 700px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px; text-align:center;">Past Schedule class A</h3>
                <br><br>
                <div class="scheduleWrap" style=" height: 550px; overflow: hidden; background: linear-gradient(to top, #999 0, #ffffff 30px, #ffffff 100%); overflow: scroll;">
                    <table class="table">

                    <thead>
                                            <tr>
                                            <th scope="col">Date & TIme</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Teacher</th>

                                            <!-- <th scope="col">Description</th> -->
                                            </tr>
                        </thead>

                        <tbody>
                            @foreach($scheduleA_past as $data)
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

                <!-- <a href="{{url('register')}}"><input type="button" class="Btn" value="Add Schedule" style="font-weight: bold;"></a> -->
                <br><br>
            </div>



            <!-- box ke 2 std-->

            <div class="col-md-6" style="background-color: white; width: 500px; margin-right: 10px; margin-top: 20px; height: 700px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px; text-align:center;">Past Schedule class B</h3>
                <br><br>
                <div class="scheduleWrap" style=" height: 550px; overflow: hidden; background: linear-gradient(to top, #999 0, #ffffff 30px, #ffffff 100%); overflow: scroll;">
                    <table class="table">

                        <thead>
                            <tr>
                            <th scope="col">Date & TIme</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Teacher</th>

                            <!-- <th scope="col">Description</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($scheduleB_past as $data)
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

                <!-- <a href="{{url('register')}}"><input type="button" class="Btn" value="Add Schedule" style="font-weight: bold;"></a> -->
                <br><br>
            </div>

            <br><br><br><br>

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
