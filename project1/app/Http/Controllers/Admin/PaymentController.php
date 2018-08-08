<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentFormRequest;
use App\ModeOfPayment;

class PaymentController extends Controller
{
    //
    public function index ()
    {
        $modeOfPayments = ModeOfPayment::all();

        return view('admin.payments.index', compact('modeOfPayments'));
    }

    public function create ()
    {
        return view('admin.payments.create');
    }

    public function store (PaymentFormRequest $request)
    {
        ModeOfPayment::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->back()->with('status', __('payment.created') );
    }

    public function edit ($id)
    {
        $payment = ModeOfPayment::findOrFail($id);
        
        return view('admin.payments.edit', compact('payment'));
    }

    public function update (PaymentFormRequest $request, $id)
    {
        $payment = ModeOfPayment::findOrFail($id);
        $payment->name = $request->get('name');
        $payment->save();

        return redirect()->back()->with('status', __('payment.updated') );
    }

    public function delete ($id)
    {
        $payment = ModeOfPayment::findOrFail($id);
        $payment->delete();

        return redirect()->route('mode-of-payments')->with('status', __('payment.deleted'));
    }
}
