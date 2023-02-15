<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <!-- my CSS -->
    <link rel="stylesheet" href="/myCSS/layout.css">
    <link rel="stylesheet" href="/myCSS/forum.css">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
        trix-toolbar [data-trix-button-group = "file-tools"]
        {
            display: none;
        }
    </style>

    <title>Forum</title>

</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand" href="{{url('home')}}"><img src="/myAssets/kepompongLogoNew.png" alt=""
                                                            width="200px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="text-light nav-link {{ Request::is('forum') ? 'active' : ''}}" aria-current="page" href="/home-<?php echo Session::get('category'); ?>">
                        <span data-feather="chevron-left" class="align-text-bottom"></span>
                        Back to Home

                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- akhir navbar -->
<!-- content -->



<section id="section1">
    <div class="container">

        <div class="row">
            @include('forum.layouts.sidebar')

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')

            </div>
        </div>
    </div>

</section>

<!-- end content -->

<!-- Footer -->
<footer class="text-center text-lg-start text-white" style="background-color: #1c2331; padding-top:20px;">


    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <img src="/myAssets/kepompongLogoNew.png" alt="kepompong" style="width:200px;">

                    <p style="color: white; font-size: 15px; margin-top: 15px;">
                        Platform bimbel online coding terlengkap dan terpercaya di Indonesia.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Partners</h6>
                    <hr
                        class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #7c4dff; height: 2px"
                    />
                    <p>
                        <a href="https://binus.ac.id/"><img src="/myAssets/logoBinusWhite.png" alt="Binus University"
                                                            style="width:200px;"></a>
                    </p>

                </div>

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <!-- <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                    <p><i class="fas fa-home mr-3"></i> Binus University (Anggrek Campus), Jl. Raya Kb. Jeruk No.27, RT.1/RW.9, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530</p>
                    <p><i class="fas fa-envelope mr-3"></i> stucode@binus.ac.id</p>
                    <p><i class="fas fa-phone mr-3"></i> 021 55955959</p> -->

                    <p style="color: white; font-size: 15px; margin-top: 30px;">Binus University (Anggrek Campus), Jl.
                        Raya Kb. Jeruk No.27, RT.1/RW.9, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus
                        Ibukota Jakarta 11530</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <br><br><br>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2022 Kepompong | All Rights Reserved
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Logos -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>


<script src="/myJS/dashboard.js"></script>

</body>
</html>
