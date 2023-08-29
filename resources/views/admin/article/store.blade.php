@extends('layouts.master')
@section('head')
<meta name="csrf_token" content="{{ csrf_token() }}" />

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Classic Editor</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data" id="formW">
                @csrf
                <div class="form-group mb-3">
                    <label for="basicInput">Title</label>
                    <input type="text" name="judul" required class="form-control" id="basicInput"
                        placeholder="Enter title" />
                </div>


                <div class="form-group mb-3">
                    <label for="basicInput">Category</label>
                    <select class="form-select" name="kategori_id" aria-label="Default select example">
                        <option selected>Select Option</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="basicInput">Description</label>
                    <textarea class="form-control mb-3" id="editor" rows="10" name="deskripsi" required>

                </textarea>
                </div>



                <div class="form-group mb-3">
                    <label for="basicInput">Thumbnail Image</label>
                    <input type="file" class="form-control" name="foto">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
