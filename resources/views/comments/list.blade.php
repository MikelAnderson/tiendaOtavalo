@foreach ($list as $comment)
    @include('comments.content', ['comment'=>$comment])
@endforeach