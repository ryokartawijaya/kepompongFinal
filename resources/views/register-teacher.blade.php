
<!-- new  -->

@extends('app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myCSS/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
    <title>Register Teacher</title>
</head>
<body>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif

    <section class="registerPage" style="background-color: #eee; height: 1000px;">
        <div class="container py-5 h-100">
        <p class="text-start" style=" margin-bottom: 20px;font-weight:bolder; "><a href="{{url('home-admin')}}" style="color:#8816e1">< Back</a></p>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                    <img src="myAssets/kepompongPurple.png" alt="" style="width: 200px; margin-bottom: 50px;">
                    <h3 style="margin-bottom: 50px;">Teacher Registration</h3>
                    <form action="{{ route('register.action-teacher') }}" method="POST">
                    
                        <!-- BAGI LAYOUTT JADI 2 -->
                        <div class="row text-start">
                            @csrf
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>User ID <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="userID" value="{{ old('userID') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Course ID <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="courseID" value="{{ old('courseID') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                                </div>
                                
                                <div class="mb-3">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="{{ old('address') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Gender<span class="text-danger">*</span></label>
                                    <br>
                                    <input type="radio" id="Male" name="gender" value="Male">
                                    <label for="Male">Male</label><br>
                                    <input type="radio" id="Female" name="gender" value="Female">
                                    <label for="Female">Female</label><br>
                                </div>
                               
                                
                            </div>
                            <div class="col-md-6">                   
                                <div class="mb-3">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Date of Birth (DoB) [dd/mm/yyyy] <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="dob" value="{{ old('dob') }}" />
                                </div>
                              
                                <div class="mb-3">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
                                </div>
                                <div class="mb-3">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" />
                                </div>
                                <div class="mb-3">
                                    <label>Password Confirmation<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password_confirm" />
                                </div>

                                <input type="hidden" id="school" name="school" value="NULL" />
                                <input type="hidden" id="grade" name="grade" value="NULL" />
                                <input type="hidden" id="category" name="category" value="NULL" />
                                <input type="hidden" id="userCategory" name="userCategory" value="teacher" />
                                
                               
                            </div>

                        </div>
                        <!-- END OF COL MD 6 -->

                            <div class="mb-3" style="margin-top: 50px;">
                                <button id="registerBtn"class="btn">Register Teacher</button>
                            </div>

                            <!-- @csrf
                            <div class="mb-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                            </div>
                            <div class="mb-3">
                                <label>Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
                            </div>
                            <div class="mb-3">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" />
                            </div>
                            <div class="mb-3">
                                <label>Password Confirmation<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password_confirm" />
                            </div>

                            <div class="mb-3">
                                <label>Package Category<span class="text-danger">*</span></label>
                                <br>
                                <input type="radio" id="A" name="category" value="A">
                                <label for="A">A</label><br>
                                <input type="radio" id="B" name="category" value="B">
                                <label for="B">B</label><br>
                            </div>

                            

                            <div class="mb-3">
                                <button id="registerBtn"class="btn">Register Student</button>
                            
                                
                            </div> -->
                    </form>

                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    
    </section>
    
</body>
</html>