@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-8">
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                <div class="profile-image"><img class="rounded-circle" src="https://i.imgur.com/t9toMAQ.jpg" width="70"></div>
                <div class="d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1">
                    <a href="/dislike/{{$idea->id}}}}"><span><i class="fa fa-thumbs-down" style="font-size:24px;color:red"></i></span></a>
                    <span><div class="count" id="{{$reaction->reaction}}" name="quantity" value="{{$reaction->reaction}}">{{$reaction->reaction}}</div></span>
                    <a href="/like/{{$idea->id}}}}"><span><i class="fa fa-thumbs-up" style="font-size:24px;color:green"></i></span></a>
                </div>
                    <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <h3>{{ $idea->title }}</h3>
                        <span class="ml-2 font-weight-bold"> by {{ $user->name }}</span>
                    </div>
                    <p>
                        {{ $idea->content }}
                    </p>
                    <div class="d-flex flex-row align-items-center align-content-center post-title">
                        <span class="bdge mr-1"> File |</span>
                        <span class="mr-2 comments">Views: {{$viewsCount}} |</span>
                        </span><span> Created at : {{ $idea->created_at->format('d/m/Y') }} </span></div>
                    </div>
                    </div>
            <h4>Display Comments</h4>
                    @include('comment.new_comment_replies', ['comments' => $idea->comments, 'idea_id' => $idea->id])
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
@endsection