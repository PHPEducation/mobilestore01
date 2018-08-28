<?php

namespace App\Repositories;

use App\Product;

class ProductRepository implements RepositoryInterface
{
    protected $model;

    public function __construct (Product $product)
    {
        $this->model = $product;
    }

    public function all ()
    {
        $products = $this->model->all();

        return $products->paginate(config('custom.pagination.products_table'));
    }

    public function create (array $data)
    {
        return $this->model->create($data);
    }

    public function update (array $data, $id)
    {
        $product = $this->model->findOrFail($id);

        return $this->model->update($data, $id);
    }

    public function delete ($id)
    {
        return $product = $this->model->destroy($id);
    }

    public function show ($id)
    {
        return $this->model->findOrFail($id);
    }

    public function whereStatus ($status)
    {
        return $this->model->whereStatus($status);
    }

    public function whereCategoryId ($id)
    {
        return $this->model->whereCategoryId($id);
    }

    public function setModel ($model)
    {
        $this->model = $model;
        
        return $this;
    }

    public function with ($relations)
    {
        return $this->model->with($relations);
    }

}   
