
    <form action="{{route('store.comment', $comment)}}" method="post">
        @csrf
        @if (isset($comment->id))
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        @endif
    <fieldset>
        <input type="hidden" name="user_id" value="{{ \auth()->id()}}">
        <input type="hidden" name="product_id" value="{{ $comment->id_product}}">

      <div class="form-group">
        <textarea name="content" class="form-control" placeholder="Write a reply" aria-describedby="helpId"></textarea>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2 gap-2">
          <button type="reset" class="btn btn-light btn-sm">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm">Send Reply</button>
        </div>
      </div>
    </fieldset>
  </form>
