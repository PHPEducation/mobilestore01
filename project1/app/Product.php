<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Warehouse;
use Illuminate\Support\Str;
use DB;

class Product extends Model
{
    //
    protected $guarded = ['id'];

    public function categories ()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function images ()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function orders ()
    {
        return $this->hasMany('App\Order');
    }

    public function warehouse ()
    {
        return $this->hasOne('App\Warehouse');
    }

    public function sales ()
    {
        return $this->hasMany('App\Sale');
    }

    public function reviews ()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }

    public function scopeCreateProduct ($query, $product)
    {
        if($product->get('status')) {
            $status = 1;
        } else {
            $status = 0;
        }
        $productNew = Product::create([
            'name' => $product->get('name'),
            'price' => $product->get('price'),
            'ram' => $product->get('ram'),
            'slug' => Str::slug($product->name, '-'),
            'hard_disk' => $product->get('hard_disk'),
            'cpu' => $product->get('cpu'),
            'operating_system' => $product->get('operating_system'),
            'pin' => $product->get('pin'),
            'screen' => $product->get('screen'),
            'description' => $product->get('description'),
            'specification_more' => $product->get('specification_more'),
            'status' => $status,
            'category_id' => $product->get('category'),
        ]);
        Warehouse::create([
            'quantity' => $product->get('qty'),
            'product_id' => $productNew->id,
        ]);

        return $productNew;
    }

    public function scopeDeleteProduct($query, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return $product;
        } catch(Exception $e) {
            abort('404');
        }
    }
}
