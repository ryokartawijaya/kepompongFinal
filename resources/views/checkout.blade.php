<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- my CSS -->
    <link rel="stylesheet" href="myCSS/layout.css">
    <link rel="stylesheet" href="myCSS/checkout.css">
    <title>Checkout</title>
    <link rel="shortcut icon" type="image/x-icon" href="myAssets/favicon_package/favicon.ico" />
  </head>
  <body>
    
    <!-- navbar -->
        <nav class="navbar navbar-expand-lg shadow">
            <div class="container">
                <a class="navbar-brand" href="{{url('home')}}"><img src="myAssets/kepompongLogoNew.png" alt="" width="200px"></a>
                
            </div>
        </nav>
        <!-- akhir navbar -->
        <!-- content -->
        <section class="section1">
        <div class="container">
            
            <div class="row text-start">
                
                <div class="col-md-6">
                    <br><br>
                    <h3 style="font-weight: bolder">Checkout pesanan</h3>
                    <hr class="my-4">
                    
                    <p style="font-weight:bold;">Isi Form Pendaftaran</p>  
                    
                    <form action="{{ url('xendit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" />
                        </div>
                        <div class="mb-3">
                            <label>Alamat Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="email" />
                        </div>
                        <div class="mb-3">
                            <label>Nomor Handphone (WA)  <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="nomorHandphone" />
                        </div>
                       
                        <!-- <div class="mb-3">
                            <button id="registerBtn"class="btn">Register</button>
                        </div> -->
                        <div class="confirmCheckout" style="height: 200px; width: 500Px; border-style: solid; border-width: thin; border-color:#ededed; padding: 15px;">
                           <p>Rincian Pembelian</p>

                           <p><?php echo $_POST['paket'];  ?> (Incl. Tax) </p> 
                           <p style="color: gray; font-size: 15px;">Dengan mendaftar & beli kamu setuju dengan <a href="#" style="color: gray;">Syarat & Ketentuan</a>  dan <a href="#" style="color: gray;">Kebijakan Privasi</a>  yang berlaku</p>
                           
                           <input type="submit" class="beliSekarangBtn" value="Beli Sekarang" style="font-weight: bold;">


                        </div>
                        
                    </form>
                    <br><br><br><br>
                </div>

                <div class="col-md-6">
                    <br><br><br><br><br>
                    <div class="shadow p-3 mb-5 bg-white rounded" style="height: 150px; width: 500px; padding: 10px; margin-left: 100px; ">
                        <p style="font-weight: bold; font-size: 20px;"><?php echo $_POST['paket'];  ?> </p>
                        
                        <p style="font-size: 15px; font-weight: bold; color:gray; margin-bottom: -1px;">Sub Total</p>
                        <p style="font-weight: bold; font-size: 20px;">Rp.<?php echo $_POST['price']; ?>   <span style="font-weight: bold; font-size: 15px; text-decoration: line-through; color:red;"> Rp.<?php echo $_POST["price2"]; ?></span></p>
                       
                    </div>
                </div>
               

                

            </div>
            <div style="display:inline-block;vertical-align:top;">
                <img src="myAssets/kepompongPurple.png" alt="" width="200px" >
            </div>
            <div style="display:inline-block; ">
                <p style="margin-top: 10px;">© 2023 PT. Kepompong Nusantara</p>
            </div>
        </div>
    </section>
    
  
    

    
  </body>
</html>