@extends('app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <p class="text-start" style=" margin-bottom: 20px;font-weight:bolder; "><a href="{{url('home')}}" style="color:#8816e1">< Back</a></p>
        <!-- @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif -->

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                    <img src="myAssets/kepompongPurple.png" alt="" style="width: 200px; margin-bottom: 50px;">
                    <h3 style="margin-bottom: 50px;">Change Password</h3>
                    <form action="{{ route('change-password.action') }}" method="POST">
                    
                        <div class="row text-center">
                            @csrf
                                <!-- <p>{{$user}}</p> -->
                              
                           
                                <div class="mb-3">
                                    <label>Old Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="old_password" />
                                </div>                
                              
                                <div class="mb-3">
                                    <label>New Password <span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="new_password" />
                                </div>
                                <div class="mb-3">
                                    <label>New Password Confirmation<span class="text-danger">*</span></label>
                                    <input class="form-control " type="password" name="new_password_confirmation" />
                                </div>
                         

                                <!-- <input type="hidden" id="username" name="username" value={{$user}} /> -->
                                
                                
                                <div class="mb-3" style="margin-top: 50px;">
                                    <button style ="background-color:  #8816e1; color: white; "id="registerBtn"class="btn">Update Password</button>
                                </div>
                        </div>

                            

                            
                    </form>

                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    
    </section>
</body>
</html>