@extends('forum.layouts.main')

@section('container')

{{--    <link rel="stylesheet" href="../myCSS/layout.css">--}}

    <div class="col-lg-8 mt-3">
        <form method="post" action="/forum/posts" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus
                       value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>

                @enderror


            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                       name="slug" required value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>

                @enderror

            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)
                        @if(old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                       onchange="imagePreview()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>

                @enderror
            </div>


            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>

            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>

    <br><br><br><br><br><br>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change' , function()
        {
            fetch('/forum/posts/checkSlug?title=' + title.value)

                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });


        document.addEventListener('trix-file-accept' , function(e)
        {
            e.preventDefault();
        })

        function imagePreview()
        {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent)
            {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>


@endsection
