@extends('Layouts.main')

@section('title','Category')

@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>Tambah Kategori</h3>
        </div>
        <div class="col-md-4 text-right">
            <a href="category" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    <div class="form-container mt-4">
        <form action="/saveCategory" method="post">
            @csrf            
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    @endsection
</div>
