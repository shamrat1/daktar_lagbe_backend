<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="create" role="form">
            <div class="form-group">
                <label for="">Type</label>
                <input type="text" wire:model="type" placeholder="1st Visit" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Fee (TK)</label>
                <input type="number" placeholder="500" wire:model="fee" class="form-control">
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
