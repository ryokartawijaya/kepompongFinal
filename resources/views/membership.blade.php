

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="myCSS/membership.css">
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
    <title>Login</title>
</head>
<body>
    <!-- new -->


    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif

    <section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
    <p class="text-start" style="margin-top:-20px; font-weight:bolder; "><a href="/" style="color:#8816e1">< Back</a></p>
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

            <!-- <img src="myAssets/kepompongPurple.png" alt="" style="width: 200px; margin-bottom: 50px;"> -->
            <h1>Membership Plan</h1>
            
            

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>