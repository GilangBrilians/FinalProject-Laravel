@extends('Layouts.main')

@section('title','Category')

@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>Tambah Produk</h3>
        </div>
        <div class="col-md-4 text-right">
            <a href="products" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    <div class="form-container mt-4">
        <form action="/saveProducts" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    @foreach ($categories as $category_id => $name)
                        <option value="{{ $category_id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    @endsection
</div>