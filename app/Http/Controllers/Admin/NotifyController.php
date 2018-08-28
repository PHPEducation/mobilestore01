<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NotifyRepository;
use App\Notify;

class NotifyController extends Controller
{
    protected $model;

    public function __construct (Notify $notify)
    {
        $this->model = new NotifyRepository($notify);
    }
    
    public function seen (Request $request, $id)
    {
        if($request->ajax()) {
            $notify = $this->model->seen($id);
            
            return $notify;
        }
    }
    
    public function index ()
    {
        $notifies = $this->model->all();
        
        return view('notifies.index', compact('notifies'));
    }
}
