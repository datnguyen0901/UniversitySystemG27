@extends('layouts.app')
@section('content')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-10">
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                <div class="d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1">
                    <a href="/dislike/{{$idea->id}}}}"><span><i class="fa fa-thumbs-down" style="font-size:24px;color:red"></i></span></a>
                    <span><div class="count" id="{{$reaction}}" name="quantity" value="{{$reaction}}">{{$reaction}}</div></span>
                    <a href="/like/{{$idea->id}}}}"><span><i class="fa fa-thumbs-up" style="font-size:24px;color:green"></i></span></a>
                </div>
                    <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <h3>{{ $idea->title }}</h3>
                        <span class="ml-2 font-weight-bold"> by Anonymous</span>
                    </div>
                    <p>
                        {{ $idea->content }}
                    </p>
                    <div class="d-flex flex-row align-items-center align-content-center post-title">
                        @if(empty($file->file_path)){
                            <span class="bdge mr-1"> No File for this Idea</span>
                        }
                        @else{
                            <span class="bdge mr-1"><a href="/download/{{$idea->id}}">File</a></span>
                        }
                        @endif

                        <span class="mr-2 comments">| Views: {{$viewsCount}} |</span>
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