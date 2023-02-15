@extends('forum.layouts.main')

@section('container')

    {{--    <link rel="stylesheet" href="../myCSS/layout.css">--}}

    <div class="col-lg-8 mt-3">
        <form method="post" action="/forum/categories/store" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus
                       value="{{ old('name') }}">
                @error('name')
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

            <input type="submit" class="btn btn-success" value="Create" />
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
