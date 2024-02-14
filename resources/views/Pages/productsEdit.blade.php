@extends('Layouts.main')

@section('title','Edit Category')

@section('container')


<div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Update Produk</h3>
            <a href="products" class="btn btn-warning col-md-2">kembali</a>
        </div>
        <div class="container mt-5">
        <form action="{{ route('updateProducts') }}" method="post" class="mt-3">
            @csrf
            <input type="hidden" name="product_id" value="{{ $products->product_id }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" required="required" id="name" name="name" value="{{ $products->name }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" required="required" id="status" name="status">
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" {{ $products->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" required="required" id="category" name="category">
                    @foreach ($categories as $category_id => $name)
                        <option value="{{ $category_id }}" {{ $products->category_id == $category_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" required="required" id="price" name="price" value="{{ $products->price }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>

        </div>
    @endsection
    </div>