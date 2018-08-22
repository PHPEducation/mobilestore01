<?php

namespace App\Repositories;

use App\Order;

class OrderRepository implements RepositoryInterface
{
    protected $model;

    public function __construct (Order $order)
    {
        $this->model = $order;
    }

    public function whereId ($id)
    {
        return $this->model->whereId($id)->get();
    }

    public function delete ($id)
    {
        return $this->model->destroy($id);
    }

    public function update (array $data, $id)
    {
        $order = $this->model->findOrFail($id);

        return $this->model->update($data, $id);
    }

    public function show ($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create (array $data)
    {
        return $this->model->create($data);
    }

    public function all ()
    {
        return $this->model->all();
    }
}
