<div class="p-3 card my-3">
    <div class="d-flex align-items-center justify-content-between">
        <h6>Most Pobulat Postes</h6>
        <i class="far fa-xs fa-star ms-auto text-primary"></i>
    </div>
</div>
@foreach ($posts as $post)
    <div role="button" class="p-3 card my-3" wire:click="show({{ $post->id }})">
        <div class="a d-flex gap-3">
            <div class="">
                <img src="{{ URL('Website/img/blog/' . $post->cover_image) }}" class="img-fluid rounded mb-3"
                alt="Fissure in Sandstone" style="height: 60px; width: 100px; object-fit: cover;">
            </div>
            <div class="bg-light w-100 p-1 rounded">
                <strong>{{ $post->title }}</strong>
                <div class="d-flex justify-content-between">
                    <div>
                        <span>{{ $post->userPost->name }}</span>
                    </div>
                    <div class="">
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
