{{--
    <div class="modal-dialog modal-xl">...</div>
    <div class="modal-dialog modal-lg">...</div>
    <div class="modal-dialog modal-sm">...</div>
    <!-- Full screen modal -->
    <div class="modal-dialog modal-fullscreen-sm-down">...</div>
    <!-- Scrollable modal -->
    <div class="modal-dialog modal-dialog-scrollable">...</div>
    --}}
    <!-- Button trigger modal -->
    {{-- <button type="button" id="bmi" class="btn btn-primary"> exampleModal2 </button> --}}
<!-- Button trigger modal -->
<button type="button" id="show" class="btn btn-primary">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">...</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                    data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#show").click(function() {
            $("#exampleModal5").modal('show');
        })
    })
</script>

<!-- second -->
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop2">
    Launch modal register form
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Sign up</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form>
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name2" class="form-control" />
                        <label class="form-label" for="name2">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email2" class="form-control" />
                        <label class="form-label" for="email2">Email address</label>
                    </div>

                    <!-- password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password2" class="form-control" />
                        <label class="form-label" for="password2">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
