<div  wire:poll>
    @foreach ($posts as $post)
        <div class="d-flex p-3 card my-3">
            <div class="d-flex gap-3 align-items-center mb-3">

                @if ($post->image)
                    <img alt="Image placeholder" width="" height="60px"
                        src="{{ URL('Dashboard/img/profile/users/'.$post->image->filename) }}"
                        class="avatar rounded-circle">
                        {{$post->image->filename}}
                @else
                    <img src="{{ URL('Dashboard/img/profile/users/default.png') }}" class="rounded-circle" height="50"
                        width="50px" alt="Avatar" loading="lazy" />
                @endif

                <a href="">
                    <h6 class="text-body">
                        <span class="small text-muted font-weight-normal">@</span>
                        {{ $post->userPost->name }}
                        <span class="small text-muted font-weight-normal"> • </span><br>
                        <span
                            class="small text-muted font-weight-normal">{{ $post->created_at->diffForHumans() }}</span>
                    </h6>
                </a>
            </div>

            <div class="d-flex w-100 ps-5">
                <div class="w-100">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>{{ $post->title }}</h5>
                        {{-- <span><i class="fas fa-angle-down float-end"></i></span> --}}
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle shadow-0" type="button"
                                id="dropdownMenuButton{{ $post->id }}" data-mdb-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-bars"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $post->id }}">
                                @if (auth('web')->user()->id == $post->user_id)
                                    <li>
                                        <button wire:click="edit({{ $post->id }})"
                                            class="dropdown-item">Edit</button>
                                    </li>
                                    <li>
                                        <button
                                            wire:click="delete({{ $post->id }})"class="dropdown-item">Delete</button>
                                    </li>
                                @endif
                                <li>
                                    <button wire:click="show({{ $post->id }})" class="dropdown-item">Show</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <img src="{{ URL('Website/img/blog/' . $post->cover_image) }}" class="img-fluid rounded mb-3 w-100"
                        alt="Fissure in Sandstone" style="height: 600px; width: 100%; object-fit: cover;">

                    <p style="line-height: 1.2;">
                        {{ $post->description }}
                    </p>
                    {{-- <ul class="list-unstyled d-flex justify-content-between mb-0 pe-xl-5">
                    <li class="bg-light w-100 mx-2 p-3 d-flex justify-content-between align-items-center rounded">
                        <i class="fa-regular fa-thumbs-up fa-xl" role="button"></i><span class="small ps-2">11 K</span>
                    </li>
                    <li class="bg-light w-100 mx-2 p-3 d-flex justify-content-between align-items-center rounded">
                        <i class="fas fa-comment fa-xl" role="button"></i><span class="small ps-2">11 K</span>
                    </li>
                    <li class="bg-light w-100 mx-2 p-3 d-flex justify-content-between align-items-center rounded">
                        <i class="far fa-heart fa-xl" role="button"></i><span class="small ps-2">65 K</span>
                    </li>
                </ul> --}}
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="my-2 custom-pagination">
    {{ $posts->links() }}
</div> --}}
    {{-- <i class="fa-solid fa-thumbs-up"></i> --}}

</div>
