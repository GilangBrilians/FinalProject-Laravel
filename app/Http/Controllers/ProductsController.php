<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Models\Categories; 

class ProductsController extends Controller
{
    public function viewProducts()
    {
        $products = Products::with('categories')->get();

        return view('Pages.products', ['products' => $products]);
    }

    public function viewProductsInput()
    {
        $statuses = ['draft', 'publish']; 

        $categories = Categories::pluck('name', 'category_id');

        return view('Pages.productsInput', compact('statuses', 'categories'));
    }

    public function deleteProducts($id)
    {
        $products = Products::find($id);
        
        if (!$products) {
            return redirect('products')->with('error', 'Produk tidak ditemukan');
        }
        
        $products->delete();
        
        return redirect('products')->with('success', 'Produk berhasil dihapus');
    }

    public function saveProducts(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:draft,publish', 
            'category' => 'required|exists:categories,category_id', 
            'price' => 'required|numeric', 
        ]);
        
        $product = new Products();
        
        $product->name = $validatedData['name'];
        $product->status = $validatedData['status'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        
        $product->save();
        
        return redirect('products');
    }

    public function editProducts($id)
    {
        $products = Products::findOrFail($id);
        
        $statuses = ['draft', 'publish']; 
        
        $categories = Categories::pluck('name', 'category_id');
        
        return view('Pages.productsEdit', compact('products', 'statuses', 'categories'));
    }

    public function updateProducts(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'status' => 'required|string|in:draft,publish', 
            'category' => 'required|exists:categories,category_id', 
            'price' => 'required|numeric', 
        ]);

        $product = Products::find($validatedData['product_id']);
        
        if (!$product) {
            return redirect()->route('products')->with('error', 'Product not found.');
        }
        
        $product->name = $validatedData['name'];
        $product->status = $validatedData['status'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];

        $product->save();
        
        return redirect()->route('products')->with('success', 'Product updated successfully.');
    }

    

}
