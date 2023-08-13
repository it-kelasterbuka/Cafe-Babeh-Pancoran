@extends('dashboard.index')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">
                    Add New Catagories
                </button>
            </div>


            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="card-body">

                @if (session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong> {{ session('msg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Katagori</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($catagories as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->katagori }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalUpdate{{ $item->id }}">Update</button>
                                        <button class="btn btn-info btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $item->id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal create --}}
    @include('katagori.create-modal')

    {{-- modal update --}}
    @include('katagori.update-modal')

    {{-- modal delete --}}
    @include('katagori.delete-modal')
@endsection
