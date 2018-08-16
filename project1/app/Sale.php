<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $guarded = ['id'];
    
    public function product ()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function scopeCreateSale ($query, $request)
    {
        Sale::create([
            'price' => $request->get('price'),
            'content' => $request->get('content'),
            'product_id' => $request->get('product_id'),
        ]);
    }

    public function scopeUpdateSale ($query, $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update([
            'price' => $request->get('price'),
            'content' => $request->get('content'),
            'product_id' => $request->get('product_id'),
        ]);
    }

    public function scopeDeleteSale ($query, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
    }
}
