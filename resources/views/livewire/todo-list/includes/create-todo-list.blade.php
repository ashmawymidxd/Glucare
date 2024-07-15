<div class="pb-2">
    <div class="card">
        <form>
            <div class="card-body">
                <div class="d-flex flex-row align-items-center">
                    <input type="text" wire:model="name" class="form-control form-control-lg"
                        id="exampleFormControlInput1" placeholder="Add new...">
                    <a href="#!" data-mdb-toggle="tooltip" title="Set due date"><i
                            class="fas fa-calendar-alt fa-lg me-3 mx-3"></i></a>
                    <div>
                        <button wire:click.prevent="create" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="feedback mt-3">
    @error('name')
        <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-between" role="alert">
            <strong>Holy guacamole! {{ $message }} </strong>
            <button type="button" class="close" data-mdb-dismiss="alert" aria-mdb-label="Close">
                <span aria-mdb-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    @error('todoEditName')
        <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-between" role="alert">
            <strong>Holy guacamole! {{ $message }} </strong>
            <button type="button" class="close" data-mdb-dismiss="alert" aria-mdb-label="Close">
                <span aria-mdb-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    @if ($add_status)
        <div class="alert alert-primary alert-dismissible fade show d-flex justify-content-between" role="alert">
            <strong>Holy guacamole! todo added </strong>
            <button type="button" class="close" data-mdb-dismiss="alert" aria-mdb-label="Close">
                <span aria-mdb-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
