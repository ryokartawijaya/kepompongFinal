




@auth

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    
        <li>
            <a  href="{{ route('logout') }}">Log Out</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
    <p class="text-start" style=" margin-bottom: 20px;font-weight:bolder; "><a href="{{ URL::previous() }}" style="color:#8816e1">< Back</a></p>

        <div class="row text-start">
                    
                <H1 style="margin-bottom: 50px; margin-top: 20px;">FORM UPLOAD MATERI</H1>
                
                <form method="post" action="{{ route('images.store') }}" 
                    enctype="multipart/form-data">
                    @csrf
                    <label><h4>Add Modul Title</h4></label>
                    <input type="text" class="form-control" required name="title">
                    <br>

                    <label><h4>Add Modul Description</h4></label>
                    <input type="text" class="form-control" required name="description">
                    <br>

                    <label><h4>Add Modul Category</h4></label>
                    <input type="text" class="form-control" required name="category">
                    <br>

                    <!-- <label><h4>Add Modul Teacher</h4></label>
                    <input type="text" class="form-control" required name="teacher">
                    <p>{{$teacherName}}</p>   
                    <br> -->

                    <label><h4>Add Modul Cover</h4></label>
                    <input type="file" class="form-control" required name="image">
                    <br>

                    <label><h4>Add Video</h4></label>
                    <input type="file" class="form-control" required name="video">
                    <br><br>

                    <input type="hidden" id="teacher" name="teacher" value="{{$teacherName}}" />
                    <input type="hidden" id="teacherID" name="teacherID" value="{{$teacherID}}" />
                    

                    <div class="post_button">
                    <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
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