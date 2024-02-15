<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Products; 
use App\Models\Categories; 
use App\Models\Users; 
use App\Models\OrderItem; 
use App\Models\Orders; 


class HomeController extends Controller
{

    public function getTotalSubtotal()
    {
        return OrderItem::sum('subtotal');
    }

    public function getTotalCategoriesCount()
    {
        $totalCategoriesCount = Categories::count();
        
        return $totalCategoriesCount;
    }
    
    public function getTotalUsersCount()
    {
        $totalUsersCount = Users::count();
        
        return $totalUsersCount;
    }
    
    public function getTotalProductsCount()
    {
        $totalProductsCount = Products::count();
        
        return $totalProductsCount;
    }

    
    public function index()
    {
        $totalSubtotal = $this->getTotalSubtotal(); 

        $totalProducts = $this->getTotalProductsCount();
        $totalCategories = $this->getTotalCategoriesCount();
        $totalUsers = $this->getTotalUsersCount();

        $totalSubtotalIDR = 'Rp ' . number_format($totalSubtotal, 0, ',', '.');

        return view('Pages.home', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalUsers' => $totalUsers,
            'totalSubtotal' => $totalSubtotalIDR,

        ]);
    }
}