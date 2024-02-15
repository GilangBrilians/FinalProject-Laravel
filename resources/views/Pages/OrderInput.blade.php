@extends('Layouts.main')

@section('title','Category')

@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>Tambah Pesanan</h3>
        </div>
        <div class="col-md-4 text-right">
            <a href="orders" class="btn btn-warning">Kembali</a>
        </div>
    </div>
    <div class="form-container mt-4">
        <form action="/saveOrders" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Pelanggan</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
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
                <label for="order_total">Order Total</label>
                <input type="text" class="form-control" id="order_total" name="order_total" required>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date</label>
                <input type="date" class="form-control" id="order_date" name="order_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    @endsection
</div>