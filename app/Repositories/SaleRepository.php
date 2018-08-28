<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use App\Sale;

/**
 * 
 */
class SaleRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Sale $sale)
    {
        $this->model = $sale;
    }

    public function all ()
    {
        $sales = $this->model->all();

        return $sales->paginate(config('custom.pagination.sales_table'));
    }

    public function create (array $data)
    {
        return $this->model->create($data);
    }

    public function update (array $data, $id)
    {
        $sale = $this->model->findOrFail($id);

        return $sale->update($data);
    }

    public function delete ($id)
    {
        $sale = $this->model->findOrFail($id);

        return $sale->delete();
    }

    public function show ($id)
    {
        return $this->model->findOrFail($id);
    }
}
