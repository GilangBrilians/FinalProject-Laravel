<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        $categories = Categories::all();
        return view('Pages.category', ['categories' => $categories]);
    }

    public function viewCategoryInput()
    {
    
        return view('Pages.categoryInput');
    
    }
    
    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        
        if (!$category) {
            return redirect('category')->with('error', 'Kategori tidak ditemukan');
        }
        
        $category->delete();
        
        return redirect('category')->with('success', 'Kategori berhasil dihapus');
    }
    
    public function saveCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $category = new Categories();
        
        $category->name = $validatedData['name'];
        
        $category->save();
        
        return redirect('category');
    }
    
    public function editCategory($id)
    {
        $category = Categories::find($id);
        
        if (!$category) {
            return redirect('category')->with('error', 'Category not found.');
        }
        
        return view('Pages.categoryEdit', compact('category'));
    }
    
    public function updateCategory(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        $category = Categories::find($validatedData['id']);
        
        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found.');
        }
        
        $category->name = $validatedData['name'];
        
        $category->save();
        
        return redirect()->route('category')->with('success', 'Category updated successfully.');
    }

}
