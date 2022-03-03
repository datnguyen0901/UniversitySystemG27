@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p><b>{{ $idea->title }}</b></p>
                    <p>
                        {{ $idea->content }}
                    </p>
                    <hr />
                    <h4>Display Comments</h4>
                    @include('comment._comment_replies', ['comments' => $idea->comments, 'idea_id' => $idea->id])
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comment.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="comment_content" class="form-control" />
                            <input type="hidden" name="idea_id" value="{{ $idea->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection