@foreach($comments as $comment)
<div class="display-comment">
    <div class="coment-bottom bg-white p-2 px-4">
            <div class="commented-section mt-2">
                <div class="d-flex flex-row align-items-center commented-user">
                    <h5 class="mr-2 font-weight-bold">Anonymous</h5>
                    <span class="mb-1 ml-2">Created at : {{ $comment->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="comment-text-sm">
                    <span>{{ $comment->content }}</span>
                </div>
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
                @include('comment.new_comment_replies', ['comments' => $comment->replies])
            </div>
    </div>
</div>
@endforeach