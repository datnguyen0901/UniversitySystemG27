@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('List of Ideas') }}
                    <a href="idea/create" class="btn btn-primary1">Create new Idea</a>
                </div>
                
                <div class="card-body">
                        @foreach ($ideas as $idea)
                        <div class="card text-center">
                        <div class="card-header">
                            {{ $idea->title }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $idea->description}}</h5>
                            <p class="card-text">{{ $idea->content }}</p>
                            <a href="#" class="btn btn-primary2">Like</a>
                            <a href="#" class="btn btn-danger2">Dislike</a>
                            <a href="#" class="btn btn-primary1">Comment</a>
                        </div>
                        <div class="card-footer text-muted">
                             Created at {{ $idea->created_at->format('d/m/Y') }}
                        </div>

                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
