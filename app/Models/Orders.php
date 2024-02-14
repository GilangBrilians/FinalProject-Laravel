<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    // public $timestamps = false;
    
    public function users()
        {
            return $this->belongsTo(Users::class, 'user_id', 'id');
        }
}
