@extends('admin.master')

@section('content')
    <div class="col-md-12 row mt-5">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('category.list') }} </h1>
        <table class="table table-striped table-hover table-bordered">
           <tr>
                <th scope="col">{{ __('category.id') }}</th>
                <th scope="col">{{ __('category.name') }}</th>
                <th scope="col">{{ __('category.slug') }}</th>
                <th scope="col">{{ __('category.catalog') }}</th>
                <th scope="col">{{ __('key.edit') }}</th>
                <th scope="col">{{ __('key.delete') }}</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->catalog->name }}</td>
                    <td><a href="{{ url('admin/edit-categories/' . $category->id) }}">{{ __('key.edit') }}</a></td>
                    <td><a href="{{ url('admin/delete-categories/' . $category->id) }}">{{ __('key.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('add-categories') }}" class="btn btn-success">{{ __('category.add') }}</a>
@endsection
