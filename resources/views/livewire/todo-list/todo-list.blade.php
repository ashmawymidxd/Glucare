<div>
    <div class="container  h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div>
                    <div class="card-body px-4 px-md-5">
                        @include('livewire.todo-list.includes.header-todo-list')
                        @include('livewire.todo-list.includes.create-todo-list')
                        @include('livewire.todo-list.includes.todo-filter')
                        @include('livewire.todo-list.includes.todo-card')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
