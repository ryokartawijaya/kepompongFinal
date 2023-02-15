@auth


@extends('layout')

@section('container')

    <link rel="stylesheet" href="myCSS/study.css">
    <title>Forum</title>

    
    <section id="section1">
            <div class="container">
                
                <div class="row justify-content-center fs-4 text-center">
                    
                 <h1>This is Forum page</h1>
                    
                </div>
                
            </div>
    </section>
    
@endsection
@endauth


@guest
<?php
    // return redirect()->route('login');
    header("Location: login");
    die();
?>
@endguest