@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Ideas') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th width="280px">Description</th>
                        </tr>
                        @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>{{ $idea->title }}</td>
                            <td>{{ $idea->description }}</td>
                            <td>
                                <form action="{{ route('idea.destroy',$idea->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('idea.edit',$idea->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <a href="idea/create" class="btn btn-primary">Create new Idea</a>
            </div>
        </div>
    </div>
</div>
@endsection
