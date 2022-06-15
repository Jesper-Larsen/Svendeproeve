@extends('layouts.app')

@section('content')
<div class="container" style="color:black;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Manage</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td class=" col-sm-6"><b>{{ $user->name }} </b> <small>{{ $user->email }}</small></td>
                                <td class="col-sm-4">{{ $user->role }}</td>
                                <td class=" col-sm-1"><a href=" {{ route('admin.users.update', $user->id) }}" class="btn btn-sm btn-primary">{{ ($user->role) ? 'Demote' : 'Promote' }}</a></td>
                                <td class="col-sm-2"><a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-sm btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection