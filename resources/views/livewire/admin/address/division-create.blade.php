<div class="col">
    <div class="row">
        <h5>New Division</h5>
    </div>
    <form wire:submit.prevent="store" role="form">
        <div class="row">
            <div class="col-sm-9 col-md-9 col-lg-9">
                <input type="text" wire:model="name" placeholder="Input New Division" class="from-control w-100">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <button class="btn btn-block btn-success">Save</button>
            </div>
        </div>
    </form>
</div>