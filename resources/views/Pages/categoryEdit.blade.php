@extends('Layouts.main')

@section('title','Edit Category')

@section('container')


<div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Update Kategori</h3>
            <a href="category" class="btn btn-warning col-md-2">kembali</a>
        </div>
        <div class="container mt-5">
            <form action="{{ route('updateCategory') }}" method="post" class="mt-3">
                @csrf
                <input type="hidden" name="id" value="{{ $category->category_id }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" required="required" id="name" name="name" value="{{ $category->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    @endsection
    </div>