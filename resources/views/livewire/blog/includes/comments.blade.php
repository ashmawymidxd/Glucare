<div class="border rounded my-3">
    <div class="card-body">
        <!-- Input -->
        <form class="mb-5" wire:submit.prevent="addComment">
            <div class="d-flex mb-3">
                @if ($post_user_image)
                    <img alt="Image placeholder" width="50px" height="50px"
                        src="{{ URL('Dashboard/img/profile/users/' . $post_user_image) }}" class="avatar rounded-circle">
                @else
                    <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle"
                        height="50px" width="50px" alt="Avatar" loading="lazy" />
                @endif
                @error('writeComment')
                    <span class="text-warning">{{ $message }}</span>
                @enderror
                <div data-mdb-input-init class="form-outline w-100 ml-3">
                    <textarea wire:model='writeComment' class="form-control bg-light" id="textAreaExample" rows="2"></textarea>
                    <label class="form-label" for="textAreaExample">Write a comment for owner</label>
                </div>
            </div>
            <div class="ml-5">
                <button type="submit" class="btn btn-primary ml-3 shadow-0">
                    <div wire:loading><i class="fa-solid fa-spinner fa-spin"></i></div>
                    send
                </button>
                <button class="btn btn-secondary mx-2" wire:click="hiddComments">cancel</button>
            </div>
        </form>
        <div>
            @foreach ($allComments as $comment)
                @if ($comment->user_id == auth()->user()->id)
                    <div class="d-flex mb-3 ml-5">
                        @if ($comment->image)
                            <img alt="Image placeholder" width="50px" height="50px"
                                src="{{ URL('Dashboard/img/profile/users/' . $comment->image->filename) }}"
                                class="avatar rounded-circle">
                        @else
                            <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle"
                                height="50" width="50px" alt="Avatar" loading="lazy" />
                        @endif
                        <div>
                            <div class="bg-primary rounded-3 px-3 py-1 ml-3">
                                <a href="" class="text-light mb-0">
                                    <strong>{{ $comment->user->name }}</strong>
                                </a>
                                <a href="" class="text-light d-block">
                                    <small>{{ $comment->content }}</small>
                                </a>
                            </div>
                            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                            <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
                        </div>
                    </div>
                @else
                    <div class="d-flex mb-3">
                        @if ($comment->image)
                            <img alt="Image placeholder" width="50px" height="50px"
                                src="{{ URL('Dashboard/img/profile/users/' . $comment->image->filename) }}"
                                class="avatar rounded-circle">
                        @else
                            <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle"
                                height="50" width="50px" alt="Avatar" loading="lazy" />
                        @endif
                        <div>
                            <div class="bg-light rounded-3 px-3 py-1 ml-3">
                                <a href="" class="text-dark mb-0">
                                    <strong>{{ $comment->user->name }}</strong>
                                </a>
                                <a href="" class="text-muted d-block">
                                    <small>{{ $comment->content }}</small>
                                </a>
                            </div>
                            <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                            <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
</div>
