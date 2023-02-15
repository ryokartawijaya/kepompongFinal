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
<section class="registerPage" style="background-color: #eee; height: 1000px;">
        <div class="container py-5 h-100">
        <p class="text-start" style=" margin-bottom: 20px;font-weight:bolder; "><a href="{{ URL::previous() }}" style="color:#8816e1">< Back</a></p>
        @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                    <img src="myAssets/kepompongPurple.png" alt="" style="width: 200px; margin-bottom: 50px;">
                    <h3 style="margin-bottom: 50px;">Forgot Password</h3>
                    <form action="{{ route('forgot-password.action') }}" method="POST">

                        <div class="row text-center">
                            @csrf

                                <p>We understand that you feel worry, but you don't really need to. Please provide your email address below, and we will send reset link to your email.</p>

                                <div class="mb-3">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" />
                                </div>

                                <div class="mb-3" style="margin-top: 50px;">
                                    <button style ="background-color:  #8816e1; color: white; "id="submitEmail"class="btn">Submit Email</button>
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
