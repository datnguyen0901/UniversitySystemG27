@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('List of Submissions') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Closure Date</th>
                            <th>Final Closure Date</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($submissions as $submission)
                        <tr>
                            <td>{{ $submission->id }}</td>
                            <td>{{ $submission->name }}</td>
                            <td>{{ $submission->description }}</td>
                            <td>{{ $submission->closure_date->format('d/m/Y') }}</td>
                            <td>{{ $submission->final_closure_date->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('submission.destroy',$submission->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('submission.edit',$submission->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <a href="submission/create" class="btn btn-primary">Create new Submission</a>
            </div>
        </div>
    </div>
</div>
@endsection
