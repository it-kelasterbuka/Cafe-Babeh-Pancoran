@extends('dashboard.index')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('menu') }}" class="btn btn-sm btn-success">
                    Back Menu
                </a>
            </div>

            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <tr>
                        <th width="30%">Catagories</th>
                        <td>{{ $menu->Katagori->katagori }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Menu</th>
                        <td>{{ $menu->name_menu }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Image</th>
                        <td><img src="{{ asset('storage/image/' . $menu->img) }}" alt="images" width="50%"></td>
                    </tr>
                    <tr>
                        <th width="30%">Description</th>
                        <td>{{ $menu->desc }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Price</th>
                        <td>{{ $menu->price }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Crate At</th>
                        <td>{{ $menu->created_at }}</td>
                    </tr>
                    <tr>
                        <th width="30%">Update At</th>
                        <td>{{ $menu->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
