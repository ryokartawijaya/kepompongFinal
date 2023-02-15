<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="myCSS/login.css">
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
    <title>Kepompong Academy Email</title>
</head>
<body>
<p>Dear user, Please reset your password by clicking button below:</p>
<p>Your email : {{$data}}</p>
<p>Note: The link only valid for once, do not refresh the page!</p>

<!-- <a href="http://127.0.0.1:8000/email-resetPasswordAction/-">Reset</a> -->
<a href="http://127.0.0.1:8000/email-resetPasswordAction/{{$data}}/{{$key}}">Reset</a>
</body>
</html>

