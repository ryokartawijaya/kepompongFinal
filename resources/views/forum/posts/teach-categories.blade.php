@extends('forum.layouts.main')

@section('container')

    <div class="">

        <h1 class="mb-3"> Post Categories </h1>

            @if(session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                </div>
            @endif

                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="/forum/categories/delete" class=" btn btn-danger mb-3">Delete Categories</a>
                    <a href="/forum/categories/create-categories" class=" btn btn-success mb-3">Create Categories</a>
                </div>

    </div>

    <div class="container">
        <div class="row mb-3">

            @foreach($categories as $category)
                <div class="col-md-4">
                    <a href="/forum?category={{ $category->slug }}">


                        <div class="card bg-dark text-white mb-3">
                            <img class="card-img" src="https://source.unsplash.com/500x500?{{ $category->name }}" alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <br><br><br><br><br>




@endsection
