
@extends('layouts.master')
@section('content')
    <div class="card-body">


        <form action="{{ route('article.update', $p->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="form-group mb-3">
            <label for="basicInput">Title</label>
            <input type="text" name="judul" required class="form-control" id="basicInput" placeholder="Enter title" value="{{ $p->judul }}" />
        </div>



        <div class="form-group mb-3">
            <label for="basicInput">Category</label>
        <select class="form-select" name="kategori_id" aria-label="Default select example">
            <option selected>Select Option</option>
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}" {{ $k->id === $p->kategori_id ? 'selected' : '' }}>{{ $k->nama }}</option>
        @endforeach

          </select>
        </div>

        <div class="form-group mb-3">
            <label for="basicInput">Description</label>
            <textarea class="form-control" rows="10" id="editor" name="deskripsi" required>
            {{ $p->deskripsi }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>

</div>

@endsection
