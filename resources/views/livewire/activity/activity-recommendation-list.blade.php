<div class="my-5">
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
    <div class="container-fluid">
        <div class="row">
            @if (!$userFavoriteactivity)
                <div class="col-md-12">
                    {{-- add favorit activity form --}}
                    <div class="card p-4 m-2">
                        <form wire:submit.prevent="addFavoriteactivity">
                            <div class="mb-3">
                                <label for="activity" class="form-label">activity</label>
                                <textarea class="form-control" id="activity" wire:model="favorite_activity" rows="3"></textarea>
                                @error('favorite_activity')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card p-4 m-2">
                        <h6>Favorite activity</h6> <br>
                        <p>There is no favorite activity yet</p>
                        <p>
                            like running brisk walk yoga session relaxation exercises resistance band workout aerobic
                            exercises

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
                                <input type="text" name="" id="search_Morning" class="form-control"
                                    placeholder="By Breackfast...">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="search_Noon" class="form-control"
                                    placeholder="By Dinner...">
                            </div>
                            <div class="input-group py-3">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                                <input type="text" name="" id="search_Night" class="form-control"
                                    placeholder="By Lunch...">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary w-100" wire:click='ai_recommendation'>
                                <div wire:loading><i class="fa-solid fa-spinner fa-spin"></i></div>
                                Ai Recommendation
                            </button>
                        </div>
                        {{-- {{$user_data->favoriteActivity->favorite_activity}} --}}
                    </div>
                </div>
                <div class="col-md-9 overflow-y-scroll all_items" style="height: 100vh">
                    @foreach ($ars as $dr)
                        <div class="card p-4 mb-5 one_item">
                            <div class="">
                                <div class="row mb-3">
                                    <div class="col-md-6 img ">
                                        <img src={{ $dr->image }} alt=" don't exist image "
                                            class="w-100 mt-1 rounded-1 bg-primary text-white"
                                            style="height:250px;object-fit-cover">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <h6>Morning</h6>
                                            <p>{{ $dr->morning }}</p>
                                        </div>
                                        <div class="meal">
                                            <h6>Noon</h6>
                                            <p>{{ $dr->noon }}</p>
                                        </div>
                                        <div class="meal">
                                            <h6>Night</h6>
                                            <p>{{ $dr->night }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex gap-3 justify-content-between">
                                <div class="d-flex gap-3">
                                    <button class="btn btn-primary shadow-0" wire:click="checkout({{ $dr->id }})">
                                        Add</button>
                                    <button class="btn btn-secondary">Drop</button>
                                </div>
                                <div class="d-flex gap-3">
                                    {{-- like or dislike this male --}}
                                    <button class="btn btn-primary shadow-0" wire:click='addLike({{ $dr->id }})'>
                                        <i class="fas fa-thumbs-up"></i>
                                    </button>
                                    <button class="btn btn-warning shadow-0"
                                        wire:click='addDislike({{ $dr->id }})'>
                                        <i class="fas fa-thumbs-down"></i>
                                    </button>

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
                @endif
            </div>

            <script>
                document.addEventListener('livewire:load', function() {
                    var myModal = new bootstrap.Modal(document.getElementById('customModal'));
                    myModal.show();
                });
            </script>

            <script>
                $("#search_Morning").keyup(function() {
                    let value = $(this).val().toLowerCase();
                    $(".all_items .one_item").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                    // $("#new tr:first").show();
                });
                $("#search_Noon").keyup(function() {
                    let value = $(this).val().toLowerCase();
                    $(".all_items .one_item").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                    // $("#new tr:first").show();
                });
                $("#search_Night").keyup(function() {
                    let value = $(this).val().toLowerCase();
                    $(".all_items .one_item").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                    // $("#new tr:first").show();
                });
            </script>
        </div>
    </div>
</div>
