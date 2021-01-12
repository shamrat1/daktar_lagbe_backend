<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="create" role="form">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" wire:model="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Name In Bangla</label>
                <input type="text" wire:model="nameBn" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea wire:model="description" class="form-control" cols="30" rows="3"></textarea>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
