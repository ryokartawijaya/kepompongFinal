@auth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul | Student</title>

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
                <p style="color:white; font-weight: bold; font-size: 15px; margin-top: -25px; margin-left: 130px;" class="unselectable">Student</p>
            </li>
            <li>
                <a href="{{url('home')}}">Dashboard</a>
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

    <div class="row text-start">
        <p class="text-start" style=" margin-bottom: 20px;font-weight:bolder; "><a href="{{ URL::previous() }}" style="color:#8816e1">< Back</a></p>
        <div class="box" style="background-color: white; border-radius: 20px;padding: 10px; padding-top: 20px;">
                    @foreach($imageData as $data)
                        <?php

                            if($data->id == $_GET['videoId'] ){

                                $_SESSION["videoAddress"] = $data->video;
                                $_SESSION["videoTitle"] = $data->title;
                                $_SESSION["videoDescription"] = $data->description;
                                $_SESSION["videoTeacher"] = $data->teacher;
                                $_SESSION["videoCategory"] = $data->category;
                            }
                        ?>

                    @endforeach

                    <?php
                        $valueAddress = $_SESSION['videoAddress'];
                        $valueTitle = $_SESSION['videoTitle'];
                        $valueDesc = $_SESSION['videoDescription'];
                        $valueTeacher = $_SESSION['videoTeacher'];
                        $valueCategory = $_SESSION['videoCategory'];
                    ?>

                    <div class="">
                        <div class="videoContainer" style="width: 672px; height: 378px; border-radius: 20px;overflow: hidden;position: relative;">
                            <video controls style="width: 672px; height: 378px;"><source src="uploadedVideo/<?php echo "$valueAddress" ?>" type="video/mp4"></video>
                        </div>
                            <br>
                        <h2 style="padding-right: 180px; padding-left: 10px; text-align: justify;"><?php echo "$valueTitle"?></h2>

                        <p style="padding-right: 180px;padding-left: 10px; text-align: justify; font-size: 15px; ">Category: <a href="#" style="color:#8816e1;text-decoration: none;" ><?php echo "$valueCategory"?></a>  <br> Teacher: <a href="#" style="color: #8816e1; text-decoration: none;"><?php echo "$valueTeacher" ?></a> </p>

                        <p style="padding-right: 180px;padding-left: 10px; text-align: justify; font-size: 20px;"><?php echo "$valueDesc"?></p>
                        <br>
                        <!-- <p style="padding-right: 180px;padding-left: 10px; text-align: justify; font-size: 20px;"><?php ?></p> -->

                    </div>
                    <div class="">
                        <a href="#" style="text-decoration: none;">
                            <div class="text-center" id="postQuestions">
                                <p style="color: white; font-weight: bolder; font-size: 25px; padding-top: 10px;" class="">POST QUESTIONS</p>
                                <p style="color: white; font-weight: 400; font-size: 20px;margin-top: -10px;" class="">5 Pertanyaan (5 Questions)</p>

                            </div>
                        </a>

                        <!-- <a href="#" style="color:#8816e1; "><p style="margin-top: 10px; ">Check discussion about: <?php echo "$valueTitle";?></p></a> -->
                    </div>







                </div>
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
