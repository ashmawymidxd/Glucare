<div class="card p-3 my-3">
    <form wire:submit.prevent="update">
        <div class="card-header">
            Update Model
        </div>
        <div class="card-body">
            <input type="hidden" wire:model="post_id">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" wire:model="title" class="form-control" id="title" placeholder="Enter title">
                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea wire:model="description" class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="customFile">Select Cover Image</label>
                <input type="file" wire:model="cover_image" class="form-control" id="customFile" />
                @error('cover_image')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="card-footer">
            <div class="d-flex gap-3">
                <button type="submit" class="btn btn-primary shadow-0" wire:loading.class='btn-success'>
                    Update <div wire:loading><i class="fa-solid fa-spinner fa-spin"></i>
                </button>
                <button type="button" class="btn btn-secondary" wire:click="closeAddModal">Cancel</button>
            </div>
        </div>
    </form>
</div>
