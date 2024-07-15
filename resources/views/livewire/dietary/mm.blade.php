<style>
    .overflow-y-scroll::-webkit-scrollbar-thumb {
        background-color: #3b71ca;
        /* Change to blue or any color you like */
        border-radius: 3px;
        /* Adjust the radius to make it more "beautiful" */
    }

    .overflow-y-scroll::-webkit-scrollbar {
        width: 10px;
        /* Set a width for the scrollbar */
        margin-right: 10px;
        height: 100px;
        background-color: rgb(255, 255, 255)
    }
</style>
<div class="my-5">
    <div class="container-fluid">
        <div class="row ">
            @if (!$userFavoriteFood)
                <div class="col-md-12">
                    {{-- add favorit food form --}}
                    <div class="card p-4 m-2">
                        <form wire:submit.prevent="addFavoriteFood">
                            <div class="mb-3">
                                <label for="food" class="form-label">Food</label>
                                <textarea class="form-control" id="food" wire:model="favorite_food" rows="3"></textarea>
                                @error('favorite_food')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card p-4 m-2">
                        <h6>Favorite Food</h6> <br>
                        <p>There is no favorite food yet</p>
                        <p>
                            to continue, please add your favorite food
                            may liks apple or orange or meet or fish or pasta or rice or any other food

                        </p>
                    </div>
                </div>
            @else
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Fillter Food Meals</strong>
                        </div>
                        <div class="card-body">
                            <div class="input-group py-3">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="By Breackfast...">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="By Diner...">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="By Lunch...">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="By Protein">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="By Fats">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="" class="form-control"
                                    placeholder="By Carbohydrates">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100">Ai Recommendation</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 overflow-y-scroll" style="height: 100vh">
                    @foreach ($drs as $dr)
                        <div class="col-md-12">
                            <div class="card p-4 mb-5">
                                <div class="">
                                    <div class="row mb-3">
                                        <div class="img col-md-6">
                                            <img src={{ $dr->image }} alt=" don't exist image "
                                                class="w-100 mt-1 rounded-1 bg-primary text-white"
                                                style="height:350px;object-fit-cover">
                                        </div>
                                        <div class="meal col-md-6">
                                            <p>
                                                <strong>Nutritional Information:</strong>
                                                <br>
                                                Total Calories: {{ $dr->totalCalories }}
                                                <br>
                                                Carbohydrates: {{ $dr->carbohydrates }}
                                                <br>
                                                Proteins: {{ $dr->proteins }}
                                                <br>
                                                Fats: {{ $dr->fats }}
                                            </p>
                                            <h6>Breakfast</h6>
                                            <p>{{ $dr->breakfast }}</p>
                                            <h6>Lunch</h6>
                                            <p>{{ $dr->lunch }}</p>
                                            <h6>Dinner</h6>
                                            <p>{{ $dr->dinner }}</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex gap-3 justify-content-between">
                                    <div class="d-flex gap-3">
                                        <button class="btn btn-primary shadow-0"
                                            wire:click="checkout({{ $dr->id }})">
                                            Add</button>
                                        <button class="btn btn-secondary">Drop</button>
                                    </div>
                                    <div class="d-flex gap-3">
                                        {{-- like or dislike this male --}}
                                        <button class="btn btn-primary shadow-0"
                                            wire:click='addLike({{ $dr->id }})'>
                                            <i class="fas fa-thumbs-up"></i>
                                        </button>
                                        <button class="btn btn-warning shadow-0"
                                            wire:click='addDislike({{ $dr->id }})'>
                                            <i class="fas fa-thumbs-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div>
                <!-- Conditionally render the modal -->
                @if ($check)
                    <div class="modal fade show" id="customModal" tabindex="-1" aria-labelledby="customModalLabel"
                        aria-hidden="fals" style="display: block;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            </div>
                            <div class="modal-body">{{ $check }}</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                                    wire:click='closeModel'>Close</button>
                            </div>
                        </div>
                    </div>
            </div>

            <script>
                document.addEventListener('livewire:load', function() {
                    var myModal = new bootstrap.Modal(document.getElementById('customModal'));
                    myModal.show();
                });
            </script>
            @endif
        </div>
    </div>
</div>
</div>
