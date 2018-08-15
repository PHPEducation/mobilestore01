@extends('admin.master')

@section('content')
    <div class="col-md-12 row mt-5">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('slide.list') }} </h1>
        <table class="table table-bordered table-hover">
           <tr>
                <th scope="col">{{ __('slide.image') }}</th>
                <th id="slide-delete">{{ __('slide.delete') }}</th>
            </tr>
            @foreach($slides as $slide)
                <tr>
                    <td>
                        <img src="{{ asset('images/slides' . $slide->image) }}">
                    </td>
                    <td><a href="{{ route('delete-slides', ['id' => $slide->id]) }}">{{ __('slide.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-12 row justify-content-end">{{ $slides->links() }}</div>
        <a href="{{ route('add-slides') }}" class="btn btn-success">{{ __('slide.create') }}</a>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/users/users.css') }}">
        <script type="text/javascript" src="{{ asset('js/admin/users/users.js') }}"></script>
@endsection
