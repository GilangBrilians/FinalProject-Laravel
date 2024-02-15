<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use App\Models\Users; 

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function viewOrders()
    {
        $orders = Orders::with('users')->get();

        return view('Pages.orders', ['orders' => $orders]);
    }

    public function viewFilter(Request $request)
    {
        $query = Orders::query();

        if ($request->filled('start_date')) {
            $query->where('order_date', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->where('order_date', '<=', $request->end_date);
        }

        $orders = $query->with('users')->get();

        return view('Pages.orders', compact('orders'));
    }

    public function viewOrdersInput()
    {
        $orders = Orders::with('users')->get();
        $users = Users::all(); 

        $statuses = ['pending', 'on_progress', 'paid', 'delivered']; 


        return view('Pages.orderInput', ['orders' => $orders, 'users' => $users, 'statuses' => $statuses]);
    }
    

    
}
