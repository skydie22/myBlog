@extends('layouts.master')
@section('head')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add New Article</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data" id="formW">
                <div class="row">
                    <div class="col-7">

                        @csrf
                        <div class="form-group mb-3">
                            <label for="basicInput">Title</label>
                            <input type="text" name="judul" required class="form-control" id="basicInput"
                                placeholder="Enter title" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="basicInput">Description</label>
                            <textarea class="form-control mb-3" id="editor" rows="10" name="deskripsi" required>
                        </textarea>
                        </div>
                    </div>

                    <div class="col-5">
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
                            <label for="basicInput">Featured Image</label>
                            <input type="file" id="selectImage"  accept="img/*" onchange="showPreview(event)" class="form-control" name="foto">
                            <img id="preview" src="#" width="250px" height="200px" class="mt-3" style="display:none;"/>

                        </div>





                        <button type="submit" class="btn btn-primary mt-3">Save</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
      selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
                console.log('berhasil')
            }
        }
    </script>

@endpush
