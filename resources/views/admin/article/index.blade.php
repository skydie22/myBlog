@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Article</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                        <a href="{{ route('article.create') }}" class="btn btn-primary">Add Article</a>

                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->judul }}</td>
                                    {{-- <td>{{ $p->deskripsi }}</td> --}}
                                    <td>{{ Str::limit(strip_tags($p->deskripsi), 50) }}</td>
                                    <td>
                                        <a href="{{ route('article.update', $p->id) }}" class="btn btn-success">update</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-post{{ $p->id }}">delete</button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    @include('admin.article.delete')
@endsection
