@extends('admin.master')
 @section('content')
    <div class="col-md-12 row mt-5">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('notify.list') }} </h1>
        <table class="table table-striped table-hover table-bordered">
           <tr>
                <th scope="col">{{ __('notify.id') }}</th>
                <th scope="col">{{ __('notify.content') }}</th>
                <th scope="col">{{ __('notify.link') }}</th>
                <th scope="col">{{ __('notify.status') }}</th>
            </tr>
            @foreach($notifies as $notify)
                <tr>
                    <td>{{ $notify->id }}</td>
                    <td>{{ link_to($notify->link, $notify->content) }}</td>
                    <td>{{ $notify->link }}</td>
                    <td>{{ $notify->status == 1 ? __('notify.seen') : __('notify.notSeen')}}</td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-12 row justify-content-end">{{ $notifies->links() }}</div>
        <div>
            {{ link_to_route('home', __('key.back'), [], ['class' => 'btn btn-success']) }}
        </div>
@endsection
