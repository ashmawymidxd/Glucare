<div>
    <!-- Messages display -->
    <div class="card overflow-y-scroll" style="height: 70vh">
        <div class="card-header d-flex align-items-center gap-2">
            <i class="fa-solid fa-arrow-left fa-xl" role="button" id="backbtn"></i>
            @if (auth('web')->check())
                @if ($doctor->image)
                    <img class="rounded-circle"
                        src="{{ asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}" height="50px"
                        width="50px" alt="">
                @else
                    <img class="rounded-circle" src="{{ asset('Dashboard/img/profile/doctors/default.png') }}"
                        height="50px" width="50px" alt="">
                @endif
                <div class=''>
                    <strong>Dr: {{ $doctor->name }}</strong> <br>
                    {{-- <small>{{ $lastMessage->created_at->diffForHumans() }}</small> --}}
                </div>
            @else
                @if ($user->image)
                    <img class="rounded-circle"
                        src="{{ asset('Dashboard/img/profile/users/' . $user->image->filename) }}" height="50px"
                        width="50px" alt="">
                @else
                    <img class="rounded-circle" src="{{ asset('Dashboard/img/profile/users/default.png') }}"
                        height="50px" width="50px" alt="">
                @endif
                <div class=''>
                    <strong>Mr: {{ $user->name }}</strong> <br>
                    {{-- <small>{{ $lastMessage->created_at->diffForHumans() }}</small> --}}
                </div>

            @endif
        </div>
        <div class="card-body">

            @if ($messages != null)
                @foreach ($messages as $message)
                    @if ($message->type == Auth::user()->id)
                        <div class="d-flex flex-row justify-content-start">
                            @if (Str::startsWith($message->message, ['http://', 'https://']))
                                <a class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary my-2"
                                    style="text-decoration:underline" href="{{ $message->message }}" target="_blank">
                                    <i class="fa-solid fa-link"></i> "Link" ::
                                    {{ $message->message }}</a>
                            @else
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary my-2">
                                    {{ $message->message }}
                                </p>
                            @endif
                            <p class="small me-3 mb-3 rounded-3 text-muted my-3">
                                {{ $message->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @else
                        <div class="d-flex flex-row justify-content-end">
                            <p class="small me-3 mb-3 rounded-3 text-muted mx-3 my-3">
                                {{ $message->created_at->diffForHumans() }}</p>
                            @if (Str::startsWith($message->message, ['http://', 'https://']))
                                <a class="small p-2 ms-3 mb-1 rounded-3 my-2"
                                    style="background-color: #f5f6f7;text-decoration:underline"
                                    href="{{ $message->message }}" target="_blank">{{ $message->message }}</a>
                            @else
                                <p class="small p-2 ms-3 mb-1 rounded-3 my-2" style="background-color: #f5f6f7;">
                                    {{ $message->message }}</p>
                            @endif
                        </div>
                    @endif
                @endforeach
            @else
                <p>No messages yet</p>
            @endif
        </div>
    </div>
    <div class="card mt-3 p-3">
        <!-- Message input form -->
        <form wire:submit.prevent="sendMessage">
            <div class="">
                <input type="text" wire:model="newMessage" class="form-control p-3">
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary mt-3 shadow-0">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                    @if (auth('doctor')->check())
                        <button type="button" wire:click="typeVideo" class="btn btn-secondary mt-3">
                            <i class="fa-solid fa-video"></i>
                        </button>
                    @endif

                </div>
            </div>
        </form>
    </div>

</div>

<script>
    $("#backbtn").click(function() {
        window.history.back();
    });
</script>
