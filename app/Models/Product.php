<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'medicinetype_id ',
        'brand_id',
        'admin_id',
        'product_name',
        'product_slug',
        'generic_name',
        'power',
        'purchase_price',
        'mrp',
        'discount',
        'stock_quantity',
        'description',
        'product_image',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
     public function medicinetype()
    {
        return $this->belongsTo('App\Models\Medicinetype');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

  

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

     public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }


}
