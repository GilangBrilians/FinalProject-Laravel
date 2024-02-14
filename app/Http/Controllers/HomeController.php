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

    public function getTotalNewCount()
    {
        return Orders::where('order_status', 'new')->count();
    }
    
    public function getTotalInProgressOrdersCount()
    {
        return Orders::where('order_status', 'on_progress')->count();
    }

    public function getTotalDoneCount()
    {
        return Orders::where('order_status', 'done')->count();
    }

    public function getTotalDeliveredCount()
    {
        return Orders::where('order_status', 'delivered')->count();
    }
    
    public function index()
    {
        $totalSubtotal = $this->getTotalSubtotal(); 

        $totalProducts = $this->getTotalProductsCount();
        $totalCategories = $this->getTotalCategoriesCount();
        $totalUsers = $this->getTotalUsersCount();
        $totalOnProgress = $this->getTotalInProgressOrdersCount();
        $totalDone = $this->getTotalDoneCount();
        $totalDelivered = $this->getTotalDeliveredCount();
        $totalNew = $this->getTotalNewCount();

        $totalSubtotalIDR = 'Rp ' . number_format($totalSubtotal, 0, ',', '.');

        return view('Pages.home', [
            'totalProducts' => $totalProducts,
            'totalCategories' => $totalCategories,
            'totalUsers' => $totalUsers,
            'totalOnProgress' => $totalOnProgress,
            'totalDone' => $totalDone,
            'totalDelivered' => $totalDelivered,
            'totalNew' => $totalNew,
            'totalSubtotal' => $totalSubtotalIDR,

        ]);
    }
}