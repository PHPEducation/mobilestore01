<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SaleRepository;
use App\Sale;
use App\Product;
use App\Category;

class SaleController extends Controller
{
    public $model;

    public function __construct(Sale $sale)
    {
        $this->model = new SaleRepository($sale);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $data['price'] = $request->get('priceSale');
        $data['content'] = $request->get('contentSale');
        $data['product_id'] = $request->get('product_id');
        $sale = $this->model->create($data);

        return redirect()->back()->with('status', __('product.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [];
        $data['price'] = $request->get('priceSale');
        $data['content'] = $request->get('contentSale');
        $data['product_id'] = $request->get('product_id');
        $sale = $this->model->update($data, $id);

        return redirect()->back()->with('status', __('product.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $sale = $this->model->delete($id);

        return redirect()->back()->with('product.deleted');
    }
}
