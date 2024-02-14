@extends('Layouts.main')

@section('title','Input Category')

@section('container')

    <div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Data Produk</h3>
            <a href="/viewProductsInput" class="btn btn-primary col-md-2 mb-3">Tambah Data</a>
        </div>
        <form action="{{ route('products.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari nama produk..." name="search">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->categories->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="/editProducts/{{ $product->product_id }}">Edit</a> |
                        <a href="/deleteProducts/{{ $product->product_id }}">Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endsection
    </div>
</div>