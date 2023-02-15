@extends('forum.layouts.main')

@section('container')

    <div class="row justify-content-center my-3">
        <div class="col-md-6">
            <form action="/forum">

                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if(request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                    <div class="input-group-append mx-3">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    @if($posts->count())

    <div class="container">
        <div class="row">
            @foreach($posts as $post)

                <div class="col-md-4 mb-3">

                    <div class="card my-3 shadow p-3 mb-5 bg-body rounded">

                        @if($post->image)
                            <div style="max-height: 325px; overflow: hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                     class="img-fluid">
                            </div>
                        @else
                            <img class="card-img-top" src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                 alt="{{ $post->category->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $post -> title }}</h5>
                            <p class="card-text">{{ $post -> excerpt }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    By: <a href="/forum?author={{ $post->user?->username }}" class="text-decoration-none">{{ $post->user?->username }}</a>
                                    <br>
                                    <a>Created at {{ $post -> created_at -> diffForHumans() }}</a>
                                </small>
                            </p>
                            <a href="/forum/{{ $post -> slug }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>


    @else
        <p class="text-center fs-4"> No Posts Found</p>
    @endif

    {{ $posts->links() }}

    <br><br><br><br><br><br><br><br>

@endsection
