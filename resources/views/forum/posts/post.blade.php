@extends('forum.layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="mb-3">{{ $post->title }}</h1>

                <p>By: <a href="/forum?author={{ $post->user?->username }}" class="text-decoration-none">{{ $post->user?->username }}</a>
                    in <a href="/forum?category={{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                </p>

                @if($post->image)
                    <div style="max-height: 400px; overflow: hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                             class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}"
                         class="img-fluid">
                @endif

                <article class="my-3 fs-5">

                    {!! $post->body !!}


                </article>
                <div class="row justify-content-between">
                    <a href="/forum" class="d-block mt-3"> Back to posts</a>
                </div>

            </div>
        </div>
    </div>

    <br><br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <span>
                    <h1 class="border-top mb-3">Comments</h1>
                </span>

                <div>

                    @include('forum.posts.comments', ['comments' => $post->comments, 'post_id' => $post->id])

                </div>

                    <div class="border-top mt-3">
                    <h4>Add comment</h4>

                    <form method="post" action="/forum/posts/comment/store">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />

                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>

                    </form>



                </div>




            </div>
        </div>
    </div>

    <br><br><br><br>



@endsection
