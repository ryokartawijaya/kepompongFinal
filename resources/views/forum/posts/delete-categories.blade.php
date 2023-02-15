@extends('forum.layouts.main')

@section('container')

    <div class="container-fluid">

        <!-- Page Heading -->


        <!-- Content Row -->
        <div class="card mt-3">
            <div class="align-items-center card-header py-3 d-flex">
                <a href="/forum/categories" class=" btn btn-primary mb-3">
                    <span data-feather="chevron-left" class="align-text-bottom"></span> Back to Categories</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-category" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr data-entry-id="{{ $category->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <form onclick="return confirm('Are you sure ? ')" class="d-inline" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <span data-feather="x-circle" class="align-text-bottom"></span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Content Row -->

    </div>

    <br><br><br><br>




@endsection
