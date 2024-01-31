@foreach ($list as $comment)

    <h3 class="text-center">Comments about this product:</h3>

    @include('comments.content', ['comment'=>$comment])
@endforeach