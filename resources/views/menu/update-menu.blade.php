@extends('dashboard.index')

@section('content')
    <div class="container mt-4 mb-5">
        <div class="card">
            <div class="card-header">
                <h2>Update Menu</h2>
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


            <form action="{{ url('menu/' . $menu->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="row m-2">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name_menu">Menu</label>
                            <input type="text" name="name_menu" id="name_menu" class="form-control"
                                value="{{ old('name_menu', $menu->name_menu) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="katagori_id">Catagories</label>
                            <select name="katagori_id" id="katagori_id" class="form-control">
                                @foreach ($catagories as $item)
                                    @if ($item->id == $menu->katagori_id)
                                        <option value="{{ old('katagori_id', $item->id) }}" selected>{{ $item->katagori }}
                                        </option>
                                    @else
                                        <option value="{{ old('katagori_id', $item->id) }}">{{ $item->katagori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="desc">Description</label>
                            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ old('desc', $menu->desc) }}
                            </textarea>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <input type="hidden" name="oldImg" value="{{ $menu->img }}">
                        <div class="mb-3">
                            <label for="img">Image (Max 2MB)</label>
                            <input type="file" name="img" id="img" class="form-control">
                            <div class="mt-1">
                                <small>Gambar Lama</small><br>
                                <img src="{{ asset('storage/image/' . $menu->img) }}" alt="imgOld" width="100px">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ old('price', $menu->price) }}">
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
