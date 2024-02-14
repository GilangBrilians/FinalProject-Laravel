@extends('Layouts.main')

@section('title','Input Category')

@section('container')

    <div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Data Produk</h3>
            <a href="/viewProductsInput" class="btn btn-primary col-md-2 mb-3">Tambah Data</a>
        </div>
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
                @foreach($products as $products)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->status }}</td>
                    <td>{{ $products->categories->name }}</td>
                    <td>{{ $products->price }}</td>
                    <td>
                        <a href="/editProducts/{{ $products->product_id }}">Edit</a> |
                        <a href="/deleteProducts/{{ $products->product_id }}">Hapus</a>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endsection
    </div>
</div>