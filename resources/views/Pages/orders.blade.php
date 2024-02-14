@extends('Layouts.main')

@section('title','Input Category')

@section('container')
    
    <div class="container mt-5">
        <div class="row">
            <h3 class="col-md-10">Data Orders</h3>
        </div>
        <form action="{{ route('orders.filter') }}" method="GET" class="mb-5 mt-3">
            <div class="row">
                <div class="col-6">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="col-5">
                    <label for="end_date">End Date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-secondary mt-auto">Filter</button>
                </div>
            </div>
        </form>
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