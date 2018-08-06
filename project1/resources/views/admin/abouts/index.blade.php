@extends('admin.master')

@section('content')
    <div class="col-md-12 justify-content-center row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('key.list') }} </h1>
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="col">ID</td>
                <th scope="col">{{ __('abouts.name') }}</td>
                <th scope="col">{{ __('key.edit') }}</td>
                <th scope="col">{{ __('key.delete') }}</td>
            </tr>
            @foreach($abouts as $about)
                <tr>
                    <td>{{ $about->id }}</td>
                    <td>{{ $about->content }}</td>
                    <td><a href="{{ url('admin/edit-abouts/' . $about->id) }}">{{ __('key.edit') }}</a></td>
                    <td><a href="{{ url('admin/delete-abouts/' . $about->id) }}">{{ __('key.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
        <div class="row">
            <a href="{{ route('add-abouts') }}" class="btn btn-success">{{ __('key.add') }}</a>
        </div>
    </div>
@endsection
