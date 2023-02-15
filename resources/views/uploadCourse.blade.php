@extends('layout')

@section('container')
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
    <link rel="stylesheet" href="myCSS/home.css">
    <title>Upload Schedule</title>

    
    <section id="section1">
            <div class="container">
                
                <!-- <div class="row justify-content-center fs-4 text-center">
                    <h1>This is home page</h1>
                </div> -->
                <br><br><br>
                <p class="text-start" style=" margin-bottom: 20px;font-weight:bolder; "><a href="{{ URL::previous() }}" style="color:#8816e1">< Back</a></p>

                <div class="row text-start">

                <H1 style="margin-bottom: 50px;">FORM UPLOAD COURSE</H1>
                
                <form method="post" action="{{ route('course.store') }}" 
                    enctype="multipart/form-data">
                    @csrf
                    <label><h4>Add Course ID</h4></label>
                    <input type="text" class="form-control" required name="courseId">
                    <br>

                    <label><h4>Add Course Title</h4></label>
                    <input type="text" class="form-control" required name="name">
                    <br>

                    <label><h4>Add Course Description</h4></label>
                    <input type="text" class="form-control" required name="description">
                    <br>

                    <label><h4>Add Course Teacher</h4></label>
                    <input type="text" class="form-control" required name="teacher">
                    <br>

                    <label><h4>Add Course Category</h4></label>
                    <input type="text" class="form-control" required name="category">
                    <br><br>

                    <div class="post_button">
                    <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
                        
                </div>

            </div>
            <br><br><br>
    </section>
    
@endsection