<!-- Modal -->
<div wire:ignore.self class="modal fade" id="delete_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">save invoices details</h5>
                <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                are you sur to delete this
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">close</button>
                <button type="button" wire:click.prevent="destroy()" class="btn btn-danger">delete</button>
            </div>

        </div>
    </div>
</div>