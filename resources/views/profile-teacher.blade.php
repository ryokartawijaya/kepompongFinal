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
            <p style="color:white; font-weight: bold; font-size: 15px; margin-top: -25px; margin-left: 130px;" class="unselectable">Teacher</p>
        </li>
        <li>
            <a href="{{url('home-teacher')}}">Dashboard</a>
        </li>
        <li>
            <a href="#">Forum</a>
        </li>
        <li>
            <a href="{{url('modules-teacher')}}">My Modul</a>
        </li>
    
        <li style="margin-top: 350px;">
            <a href="{{url('profile')}}"><img src="myAssets/profileWhite.png" alt="Profile" style="width:30px; "> Profile</a>
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

        <div class="row text-start" id="box">
            <div class="" style="background-color: white; width: 400px; margin-right: 10px; height: 650px; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1; font-weight: bolder; margin-top: 20px; text-align: center;">Your Data</h3>
                <br><br>

                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Name:</span>  {{$profileData->name}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Address:</span>  {{$profileData->address}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Gender:</span>  {{$profileData->gender}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Email:</span>  {{$profileData->email}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">DoB:</span>  {{$profileData->dob}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Course ID:</span>  {{$profileData->courseID}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Username:</span>  {{$profileData->username}}</p>
                <p style="margin-left: 10px; "> <span style="font-weight: bold;margin-right: 20px;">Password:</span> <a href="{{url('change-password-teacher')}}" style="color: #8816e1;">Change Password</a></p>


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