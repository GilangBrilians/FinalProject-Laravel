@extends('Layouts.main')

@section('title','Input Category')

@section('container')
    
    <div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Data Orders</h3>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Invoice ID</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->invoice_id }}</td>
                    <td>{{ $order->users->name }}</td>
                    <td>{{ $order->order_total }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->order_date }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endsection
    </div>
</div>