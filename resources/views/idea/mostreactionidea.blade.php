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
                <div class="card-header">
                    <a href="/myidea" class="btn btn-primary1">My Ideas</a>
                    <a href="idea" class="btn btn-primary1">All Ideas</a>
                    <a href="/showmostpopular" class="btn btn-primary1">Most Popular Ideas</a>
                    <a href="/showmostviewed" class="btn btn-primary1">Most viewed Ideas</a>
                    <a href="/lastcreated" class="btn btn-primary1">Lastest Ideas</a>
                    <a href="/lastcomment" class="btn btn-primary1">Lastest Comments</a>
                </div>

                
                <div class="card-body">
                        @foreach ($ideas as $idea)
                        <div class="card text-center">
                        <div class="card-header" style="font-weight: bolder;">
                            {{ $idea->title }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $idea->description}}</h5>
                            <a class="btn btn-primary1" href="/comment/{{$idea->id}}">View Idea</a>
                        </div>
                        <div class="card-footer text-muted">
                             Reactions : {{$idea->reactions_count}}
                             <> Create at : {{$idea->created_at}}
                        </div>

                </div>
                <h3> </h3>
                        @endforeach
                
                {!! $ideas->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
