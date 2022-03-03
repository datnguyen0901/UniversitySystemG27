@foreach($comments as $comment)
    <div class="display-comment">
        <strong>Anonymous</strong>
        <p>{{ $comment->content }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_content" class="form-control" />
                <input type="hidden" name="idea_id" value="{{ $idea_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('comment._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach