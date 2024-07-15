<hr class="my-4">
<div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
    <p class="small mb-0 me-2 text-muted">Filter</p>
    <input class="select" type="search" wire:model.live="search">

    <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
    <select class="select">
        <option value="1">Added date</option>
        <option value="2">Due date</option>
    </select>
    <a href="#!" style="color: #23af89;" data-mdb-toggle="tooltip" title="Ascending"><i
            class="fas fa-sort-amount-down-alt ms-2"></i></a>
</div>
