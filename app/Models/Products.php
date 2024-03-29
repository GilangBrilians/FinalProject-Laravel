<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    public $timestamps = false; 


    public function categories()
    {
        return $this->belongsTo(categories::class, 'category_id', 'category_id');
    }
}
