@extends('admin.master')

@section('content')
    <div class="col-md-12 justify-content-center row mt-5">
        <div class="col-md-7">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('news.list') }} </h1>
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="col">{{ __('id') }}</th>
                <th scope="col">{{ __('news.title') }}</th>
                <th scope="col">{{ __('news.content') }}</th>
                <th scope="col">{{ __('news.slug') }}</th>
                <th scope="col">{{ __('news.category_id') }}</th>
                <th scope="col">{{ __('key.edit') }}</th>
                <th scope="col">{{ __('key.delete') }}</th>
            </tr>
            @foreach($news as $news_i)
                <tr>
                    <td>{{ $news_i->id }}</td>
                    <td>{{ $news_i->title }}</td>
                    <td>{!! $news_i->content !!}</td>
                    <td>{{ $news_i->slug }}</td>
                    <td>{{ $news_i->categories->name }}</td>
                    <td><a href="{{ url('admin/edit-news/' . $news_i->id) }}">{{ __('key.edit') }}</a></td>
                    <td><a href="{{ route('delete-news', $news_i->id) }}" >{{ __('key.delete') }}</a></td>
                </tr>
            @endforeach
        </table>
            <div class="row">
                <a href="{{ route('add-news') }}" class="btn btn-success">{{ __('new.add') }}</a>
            </div>
    </div>
@endsection
