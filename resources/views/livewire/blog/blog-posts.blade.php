@if ($showPostModel)
    @include('livewire.blog.includes.show')
@else
    <div class="row">
        <div class="col-md-9">
            <div>
                @if ($updateMode)
                    @include('livewire.blog.includes.update')
                @else
                    @if ($showAddModal)
                        @include('livewire.blog.includes.create')
                    @endif
                @endif
                @if (!$showAddModal)
                    @include('livewire.blog.includes.add')
                @endif
                @include('livewire.blog.includes.card')
            </div>
        </div>
        <div class="col-md-3">
            @include('livewire.blog.includes.most-pobular')
        </div>
    </div>
@endif
