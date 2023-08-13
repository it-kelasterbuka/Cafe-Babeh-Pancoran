@extends('dashboard.index')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card">
            <div class="card-header">
                <h2>Create Menu</h2>
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


            <form action="{{ url('menu') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row m-2">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_menu">Menu</label>
                            <input type="text" name="name_menu" id="name_menu" class="form-control"
                                value="{{ old('name_menu') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="katagori_id">Catagories</label>
                            <select name="katagori_id" id="katagori_id" class="form-control">
                                <option value="" hidden>-- SELECT --</option>
                                @foreach ($catagories as $item)
                                    <option value="{{ old('katagori_id', $item->id) }}">{{ $item->katagori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <div class="mb-3">
                            <label for="img">Image (Max 2MB)</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ old('price') }}">
                        </div>
                    </div>
                </div>
                <div class="float-end m-2">
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
