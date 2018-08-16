@extends('master')

@section('content')
    <div class="col-md-12 mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-header">{{ __('cart.choosePayment') }}</div>
                    <div class="card-body">
                        {{ Form::open(['route' => 'addOrder']) }}
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('name', __('user.name') ) }}<span class="noti-required">&nbsp;(*)</span>
                                    {{ Form::text('name', isset($user->name) ? $user->name : '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('email', __('user.email') ) }}<span class="noti-required">&nbsp;(*)</span>
                                    {{ Form::text('email', isset($user->email) ? $user->email : '', ['class' => 'form-control', 'disabled' => isset($user->email) ? true : false]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('phone', __('user.phone') ) }}<span class="noti-required">&nbsp;(*)</span>
                                    {{ Form::text('phone', isset($user->phone) ? $user->phone : '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('address', __('user.address') ) }}<span class="noti-required">&nbsp;(*)</span>
                                    {{ Form::text('address', isset($user->address) ? $user->address : '', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::label('modeOfPayment', __('user.modeOfPayment') ) }}<span class="noti-required">&nbsp;(*)</span>
                                    {{ Form::select('modeOfPayment', $payments, null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    {{ Form::submit(__('cart.add'), ['class' => 'btn btn-success']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
