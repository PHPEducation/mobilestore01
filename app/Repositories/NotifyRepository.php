<?php

namespace App\Repositories;

use App\Notify;

class NotifyRepository implements RepositoryInterface
{
    protected $model;

    public function __construct (Notify $notify)
    {
        $this->model = $notify;
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
        return $this->model->paginate(config('custom.pagiantion.products_table'));
    }

    public function countNotifyNotSeen ()
    {
        $this->model->WhereStatus(0)->count();
    }

    public function seen ($id)
    {
        $notify = $this->model->findOrFail($id);
         $notify->update([
            'status' => true,
        ]);
        
        return $notify;
    }
}
