<?php

namespace App\Repositories;

use App\Detail_order;
use Illuminate\Database\Eloquent\Model;

class DetailOrderRepository implements RepositoryInterface
{
    protected $model;

    public function __construct (Detail_order $detailOrder)
    {
        $this->model = $detailOrder;
    }

    public function all ()
    {
        return $products = $this->model->all();
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

    public function setModel ($model)
    {
        $this->model = $model;
        
        return $this;
    }

    public function whereOrderId ($id)
    {
        return $this->model->whereOrderId($id)->paginate(config('custom.pagination.products_table'));
    }

    public function with ($relations)
    {
        return $this->model->with($relations);
    }
}
