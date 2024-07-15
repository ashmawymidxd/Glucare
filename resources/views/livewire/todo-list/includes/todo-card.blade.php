@foreach ($todoLists as $todoList)
    <div wire:key="{{ $todoList->id }}" class="card my-3 p-3">
        <ul class="list-group list-group-horizontal rounded-0">
            <li class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                <div class="form-check">
                    <input wire:click="toggleCompleted({{ $todoList->id }})" class="form-check-input me-0" type="checkbox"
                        value="" id="flexCheckChecked2" aria-label="..."
                        @if ($todoList->completed == 1) checked @endif />
                </div>
            </li>
            <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">{{ $todoList->name }}</p>
                @if ($todoEditId == $todoList->id)
                    <div class="btn-group shadow-0 px-2">
                        <button wire:click="cancelEdit" class="btn btn-danger">Cancel</button>
                        <input wire:model="todoEditName" type="text" class="form-controle">
                        <button wire:click="update" class="btn btn-primary">Update</button>
                    </div>
                @endif
            </li>
            <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                <div class="py-2 px-3 me-2 border border-warning rounded-3 d-flex align-items-center bg-light">
                    <p class="small mb-0">
                        <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                            <i class="fas fa-hourglass-half me-2 text-warning"></i>
                        </a>
                        {{ $todoList->created_at->diffForHumans() }}
                    </p>
                </div>
            </li>
            <li class="list-group-item ps-3 pe-0 py-1 rounded-0 border-0 bg-transparent">
                <div class="d-flex flex-row justify-content-end mb-1 btn-group">
                    <button wire:click="edit({{ $todoList->id }})" class="btn btn-secondary"><i
                            class="fas fa-pencil-alt me-3"></i></button>
                    <button wire:click="delete({{ $todoList->id }})" class="btn btn-warning"><i
                            class="fas fa-trash-alt"></i></button>
                </div>
                <div class="text-end text-muted">
                    <a href="#!" class="text-muted" data-mdb-toggle="tooltip" title="Created date">
                        <p class="small mb-0"><i class="fas fa-info-circle me-2"></i>{{ $todoList->created_at }}
                        </p>
                    </a>
                </div>
            </li>
        </ul>
    </div>
@endforeach

<div class="my-2">
    {{ $todoLists->links() }}
</div>
