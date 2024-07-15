<!-- Messages display -->
<div class="card overflow-y-scroll" style="height: 60vh" wire:poll>
    <div class="card-header">
        @if (auth('web')->check())
            @if ($doctor->image)
                <img class="rounded-circle" src="{{ asset('Dashboard/img/profile/doctors/' . $doctor->image->filename) }}"
                    height="50px" width="50px" alt="">
            @else
                <img class="rounded-circle" src="{{ asset('Dashboard/img/profile/doctors/default.png') }}" height="50px"
                    width="50px" alt="">
            @endif
            Dr : {{ $doctor->name }}
        @else
            @if ($user->image)
                <img class="rounded-circle" src="{{ asset('Dashboard/img/profile/users/' . $user->image->filename) }}"
                    height="50px" width="50px" alt="">
            @else
                <img class="rounded-circle" src="{{ asset('Dashboard/img/profile/users/default.png') }}" height="50px"
                    width="50px" alt="">
            @endif
            Patient : {{ $doctor->name }}
        @endif
    </div>
    <div class="card-body">

        @if ($messages != null)
            @foreach ($messages as $message)
                @if ($message->type == Auth::user()->id)
                    <div class="d-flex flex-row justify-content-start">
                        @if (Str::startsWith($message->message, ['http://', 'https://']))
                            <a class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary my-2"
                                href="{{ $message->message }}" target="_blank">{{ $message->message }}</a>
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
                        @if (Str::startsWith($message->message, ['http://', 'https://']))
                            <a class="small p-2 ms-3 mb-1 rounded-3 my-2"
                                style="background-color: #f5f6f7;text-decoration:underline"
                                href="{{ $message->message }}" target="_blank">{{ $message->message }}</a>
                        @else
                            <p class="small p-2 ms-3 mb-1 rounded-3 my-2" style="background-color: #f5f6f7;">
                                {{ $message->message }}</p>
                        @endif
                        <p class="small me-3 mb-3 rounded-3 text-muted mx-3 my-3">
                            {{ $message->created_at->diffForHumans() }}</p>
                    </div>
                @endif
            @endforeach
        @else
            <p>No messages yet</p>
        @endif
    </div>
</div>
