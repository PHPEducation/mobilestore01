<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentFormRequest;
use App\Mode_of_payment;

class PaymentController extends Controller
{
    //
    public function index ()
    {
        $mode_of_payments = Mode_of_payment::all();

        return view('admin.payments.index', compact('mode_of_payments'));
    }

    public function create ()
    {
        return view('admin.payments.create');
    }

    public function store (PaymentFormRequest $request)
    {
        Mode_of_payment::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->back()->with('status', __('payment.created') );
    }

    public function edit ($id)
    {
        $payment = Mode_of_payment::findOrFail($id);
        
        return view('admin.payments.edit', compact('payment'));
    }

    public function update (PaymentFormRequest $request, $id)
    {
        $payment = Mode_of_payment::findOrFail($id);
        $payment->name = $request->get('name');
        $payment->save();

        return redirect()->back()->with('status', __('payment.updated') );
    }

    public function delete ($id)
    {
        $payment = Mode_of_payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('mode-of-payments')->with('status', __('payment.deleted'));
    }
}
