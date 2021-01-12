<div class="card">
    <div class="card-body">
        <form wire:submit.prevent="create" role="form">
            <div class="form-group">
                <label for="">Days</label>
                <input type="text" wire:model="days" placeholder="Saturday,Sunday,Monday" class="form-control">
            </div>
            <div class="form-group">
                <label for="">From</label>
                <input type="text" placeholder="12:00 PM" wire:model="from" class="form-control">
            </div>
            <div class="form-group">
                <label for="">To</label>
                    <input type="text" wire:model="to" placeholder="12:00 PM" class="form-control">
                </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
