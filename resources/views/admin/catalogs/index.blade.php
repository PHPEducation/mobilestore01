@extends('admin.master')
 @section('content')
    <div class="col-md-12 row mt-5">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('catalog.list') }} </h1>
        <table class="table table-striped table-hover table-bordered">
           <tr>
                <th scope="col">{{ __('catalog.id') }}</th>
                <th scope="col">{{ __('catalog.name') }}</th>
                <th scope="col">{{ __('catalog.slug') }}</th>
                <th scope="col">{{ __('catalog.all_categories') }}</th>
                <th scope="col">{{ __('home.edit') }}</th>
                <th scope="col">{{ __('home.delete') }}</th>
            </tr>
            @foreach($catalogs as $catalog)
                <tr>
                    <td>{{ $catalog->id }}</td>
                    <td>{{ $catalog->name }}</td>
                    <td>{{ $catalog->slug }}</td>
                    <td><a href="{{ route('categories_of_catalog', ['slug' => $catalog->slug]) }}">{{ __('catalog.all_categories') }}</a></td>
                    <td><a href="{{ url('admin/edit-catalogs/' . $catalog->slug) }}">{{ __('home.edit') }}</a></td>
                    <td><a onclick="return window.confirm('Are you sure delete ' + '{{ $catalog->name }}')" href="{{ url('admin/delete-catalogs/' . $catalog->id) }}">{{ __('home.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-12 row justify-content-end">{{ $catalogs->links() }}</div>
        <a href="{{ route('add-catalogs') }}" class="btn btn-success">{{ __('home.add') }}</a>
@endsection
