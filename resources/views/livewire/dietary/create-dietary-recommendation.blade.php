<div class="containerv p-3">
    @if ($add_status)
        <div class="alert alert-success d-flex justify-content-between">
            <div class=""><strong>Success!</strong> Dietary Recommendation added successfully.</div>
            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-mdb-label="Close"></button>
        </div>
    @endif
    <form wire:submit.prevent="addDietary">
        <div class="row" id="row">
            <div class="col-md-6">
                <input type="text" class="main-input" id="breakfast" wire:model="breakfast"
                    placeholder="Enter breakfast">
                @error('breakfast')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="col-md-6">
                <input type="text" class="main-input" id="lunch" wire:model="lunch" placeholder="Enter lunch">
                @error('lunch')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row" id="row">
            <div class="col-md-6">
                <input type="text" class="main-input" id="dinner" wire:model="dinner" placeholder="Enter dinner">
                @error('dinner')
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

        {{-- totalCalories and carbohydrates --}}
        <div class="row" id="row">
            <div class="col-md-6">
                <input type="text" class="main-input" id="totalCalories" wire:model="totalCalories"
                    placeholder="Enter totalCalories">
                @error('totalCalories')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="text" class="main-input" id="carbohydrates" wire:model="carbohydrates"
                    placeholder="Enter carbohydrates">
                @error('carbohydrates')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- proteins and fats --}}
        <div class="row" id="row">
            <div class="col-md-6">
                <input type="text" class="main-input" id="proteins" wire:model="proteins"
                    placeholder="Enter proteins">
                @error('proteins')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <input type="text" class="main-input" id="fats" wire:model="fats" placeholder="Enter fats">
                @error('fats')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button class="btn btn-primary w-100 p-3 mt-5 btn-rounded" wire:loading.class='btn-success'>
            <div class="" wire:loading>
                <i class="fa-solid fa-spinner fa-spin"></i>
            </div>
            <strong class="h6">Add Dietary</strong>
        </button>
    </form>

</div>
