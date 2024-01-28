<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
      <div class="card shadow-0 border" style="background-color: #f0f2f5;">
        <div class="card-body p-4">
          <div class="form-outline mb-4">
            <input type="text" id="addANote" class="form-control" placeholder="Type comment..." />
            <label class="form-label" for="addANote">+ Add a note</label>
          </div>
  
          <div class="card">
            <div class="card-body">
              <p>{{ $comment->content}}</p>
  
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                    height="25" />
                  <p class="small mb-0 ms-2">{{ $comment->user->name}}</p>
                </div>
                <div class="">
                  <button
                    type="button"
                      class="btn btn-success btn-sm mt-3"
                      data-bs-toggle="collapse"
                      data-bs-target="#reply-{{$comment->id}}"
                      aria-pressed="false"
                      aria-controls="reply-{{$comment->id}}"
                    >
                      Reply
                    </button>
                    <div class="collapse" id="reply-{{$comment->id}}">  
                      @include('comments.add', ["comment"=>$comment])
                    </div>
                  <i class="far fa-thumbs-up ms-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  