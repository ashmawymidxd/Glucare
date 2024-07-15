<div class="d-flex p-3 card my-3">
    <div class="d-flex gap-3 align-items-center mb-3">
        @if ($post_user_image)
            <img alt="Image placeholder" width="60ppx"
                src="{{ URL('Dashboard/img/profile/users/' . $post_user_image) }}" class="avatar rounded-circle">
        @else
            <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle" height="50"
                width="50px" alt="Avatar" loading="lazy" />
        @endif
        <a href="">
            <h6 class="text-body">
                <span class="small text-muted font-weight-normal">@</span>
                {{ $post_user_name }}
                <span class="small text-muted font-weight-normal"> • </span><br>
                <span class="small text-muted font-weight-normal">{{ $post_created_at->diffForHumans() }}</span>
            </h6>
        </a>
    </div>

    <div class="d-flex w-100 ps-5">
        <div class="w-100">
            <div class="d-flex justify-content-between mb-3">
                <h5>{{ $title }}</h5>
                {{-- <span><i class="fas fa-angle-down float-end"></i></span> --}}
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button"
                        id="dropdownMenuButton{{ $post_user_id }}" data-mdb-toggle="dropdown" aria-expanded="false">
                        options
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $post_user_id }}">
                        @if (auth('web')->user()->id == $post_user_id)
                            <li>
                                <button wire:click="edit({{ $post_id }})" class="dropdown-item">Edit</button>
                            </li>
                            <li>
                                <button wire:click="delete({{ $post_id }})"class="dropdown-item">Delete</button>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <img src="{{ URL('Website/img/blog/' . $cover_image) }}" class="img-fluid rounded mb-3 w-100"
                alt="Fissure in Sandstone" style="height: 600px; width: 100%; object-fit: cover;">
            <p style="line-height: 1.2;">
                {{ $description }}
            </p>
            <ul class="list-unstyled d-flex justify-content-between gap-3">
                <li class="bg-light border w-100 p-3 d-flex justify-content-between align-items-center rounded">
                    <i class="fa-regular fa-thumbs-up fa-xl" role="button"></i><span class="small ps-2">11 K</span>
                </li>
                <li wire:click='showComments'
                    class="bg-light border w-100 p-3 d-flex justify-content-between align-items-center rounded">
                    <i class="fas fa-comment fa-xl" role="button"></i><span class="small ps-2">{{$theCommentCount}} K</span>
                </li>
                <li class="bg-light border w-100 p-3 d-flex justify-content-between align-items-center rounded">
                    <i class="far fa-heart fa-xl" role="button"></i><span class="small ps-2">65 K</span>
                </li>
            </ul>
            @if ($comments)
                @include('livewire.blog.includes.comments')
            @endif
        </div>
    </div>
</div>
