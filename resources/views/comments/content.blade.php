<div class="row d-flex justify-content-center py-2">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-0 border" style="background-color: #f0f2f5;">
        <div class="card-body p-4">
          <div class="card">
            <div class="card-body">
              <p>{{ $comment->content}}</p>
  
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                    height="25" />
                  <p class="small mb-0 ms-2">Commented by: {{ $comment->user->name}}</p>
                </div>
              </div>
              </div>
              
            </div>
            <div class="d-flex justify-content-end gap-2 form-outline mt-4">
              <input type="text" id="addANote" class="form-control" placeholder="Type reply..." />
              <button
                    type="submit"
                      class="btn btn-light"
                      data-bs-target="#reply-{{$comment->id}}"
                      aria-controls="reply-{{$comment->id}}"
                    >
                      Reply
                    </button>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
@if ($comment->reply)
    @include('comments.list', ['list'=>$comment->reply])
@endif