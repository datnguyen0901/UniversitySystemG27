@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('List of Users') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Department</th>                            
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_id }}</td>
                            <td>{{ $user->department_id }}</td>                            
                            <td>
                                <form action="url('/userdestroy{{$user->id}}')" method="POST">
                                    <a class="btn btn-primary" href="url('/usermodify{{$user->id}}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <a href="/useredit" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
