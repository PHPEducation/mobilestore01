@extends('admin.master')

@section('content')
    <div class="col-md-12 row mt-5">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
        </div>
        <h1 class="col-md-12"> {{ __('user.list') }} </h1>
        <div class="row justify-content-end col-md-12 form-group">
            <div class="col-md-4">
                <select class="form-control" id="roles">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" @if(isset($role_of_users)) @if($role_of_users->id == $role->id) selected @endif @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table table-bordered table-hover">
           <tr>
                <th scope="col">{{ __('user.id') }}</th>
                <th scope="col">{{ __('user.name') }}</th>
                <th scope="col">{{ __('user.email') }}</th>
                <th scope="col">{{ __('user.status') }}</th>
                <th scope="col">{{ __('user.address') }}</th>
                <th scope="col">{{ __('user.phone') }}</th>
                <th scope="col">{{ __('user.role') }}</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(Auth::user()->role->name == 'Manager' && $user->role->name == 'Manager')
                            <span>{{ __('user.manager') }}</span>
                        @elseif(Auth::user()->role->name == 'Admin' && ($user->role->name == 'Manager' || $user->role->name == 'Admin'))
                            @if($user->role->name == 'Manager')
                                <span>{{ __('user.manager') }}</span>
                            @elseif($user->role->name == 'Admin')
                                <span>{{ __('user.admin') }}</span>
                            @endif
                        @else
                            <div class="onoffswitch" id="onoffswitch{{$user->id}}">
                                <input type="checkbox" name="status" class="onoffswitch-checkbox" id="myonoffswitch{{$user->id }}" {{ $user->status == 1 ? 'checked' : '' }} onclick={{ $user->status == 1 ? 'unpublishUser(' . $user->id . ',' .  $user->status . ')' : 'publishUser(' . $user->id . ',' .  $user->status . ')'}}>
                                <label class="onoffswitch-label" for="myonoffswitch{{$user->id}}">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        @endif
                    </td>
                     <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role->name }}</td>
                </tr>
            @endforeach
        </table>
        <div class="col-md-12 row justify-content-end">{{ $users->links() }}</div>
        @if(Auth::user()->role->name == 'Manager')
            <a href="{{ route('admin-add-users') }}" class="btn btn-success mb-5">{{ __('user.add') }}</a>
        @endif
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/users/users.css') }}">
        <script type="text/javascript" src="{{ asset('js/admin/users/users.js') }}"></script>
@endsection
