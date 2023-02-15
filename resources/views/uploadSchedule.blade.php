@extends('layout')

@section('container')

    <link rel="stylesheet" href="myCSS/home.css">
    <title>Upload Schedule</title>

    
    <section id="section1">
            <div class="container">
                
                <!-- <div class="row justify-content-center fs-4 text-center">
                    <h1>This is home page</h1>
                </div> -->
                <br><br><br>
                <div class="row text-start">
                    
                <H1 style="margin-bottom: 50px;">FORM UPLOAD SCHEDULE</H1>
                
                <form method="post" action="{{ route('schedule.store') }}" 
                    enctype="multipart/form-data">
                    @csrf

                    <label><h4>Add Meeting ID</h4></label>
                    <input type="text" class="form-control" required name="meetingID">
                    <br>

                    <label><h4>Add Course ID</h4></label>
                    <input type="text" class="form-control" required name="courseID">
                    <br>

                    <label><h4>Add Course Title</h4></label>
                    <input type="text" class="form-control" required name="title">
                    <br>

                    <label><h4>Add Meeting Date [yyyy-mm-dd]</h4></label>
                    <input type="text" class="form-control" required name="date">
                    <br>

                    <label><h4>Add Meeting Time [hh.mm - hh.mm]</h4></label>
                    <input type="text" class="form-control" required name="time">
                    <br>

                    <label><h4>Add Course Teacher</h4></label>
                    <input type="text" class="form-control" required name="teacher">
                    <br>

                    <label><h4>Add Package Category</h4></label>
                    <input type="text" class="form-control" required name="category">
                    <br><br>

                    <label><h4>Add Zoom Meeting Link</h4></label>
                    <input type="text" class="form-control" required name="link">
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