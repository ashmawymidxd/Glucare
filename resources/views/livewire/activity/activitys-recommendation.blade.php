<div class="containerv p-3">
    @if ($add_status)
        <div class="alert alert-success d-flex justify-content-between">
            <div class=""><strong>Success!</strong> Activity Recommendation added successfully.</div>
            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-mdb-label="Close"></button>
        </div>
    @endif
    <form wire:submit.prevent="addActivity">
        <div class="row" id="row">
            <div class="col-md-6">
                <input type="text" class="main-input" id="morning" wire:model="morning"
                    placeholder="Enter morning">
                @error('morning')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-md-6">
                <input type="text" class="main-input" id="noon" wire:model="noon" placeholder="Enter noon">
                @error('noon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row" id="row">
            <div class="col-md-6">
                <input type="text" class="main-input" id="night" wire:model="night" placeholder="Enter night">
                @error('night')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="text" class="main-input" id="image" wire:model="image" placeholder="Enter image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary w-100 p-3 mt-5 btn-rounded" wire:loading.class='btn-success'>
            <div class="" wire:loading>
                <i class="fa-solid fa-spinner fa-spin"></i>
            </div>
            <strong class="h6">Add Activity</strong>
        </button>
    </form>

</div>
