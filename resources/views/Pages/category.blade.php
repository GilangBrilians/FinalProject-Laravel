@extends('Layouts.main')

@section('title','Input Category')

@section('container')

    <div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Data Kategori</h3>
            <a href="/viewCategoryInput" class="btn btn-primary col-md-2 mb-3">Tambah Data</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categories)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $categories->category_id }}</td>
                    <td>{{ $categories->name }}</td>
                    <td>
                        <a href="/editCategory/{{ $categories->category_id }}">Edit</a> |
                        <a href="/deleteCategory/{{ $categories->category_id }}">Hapus</a>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endsection
    </div>
</div>