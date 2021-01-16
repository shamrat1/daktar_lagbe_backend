<div class="col">
    <div class="row">
        <h5>New City</h5>
    </div>
    <form wire:submit.prevent="store" role="form">
        <div class="row">
            <div class="col-sm-9 col-md-9 col-lg-9 mb-2">
                <select name="division_id" class="form-control" wire:model="division_id" id="">
                    <option value="">Select Division</option>
                    @foreach($divisions as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('division_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                <input type="text" wire:model="name" placeholder="Input City Division" class="from-control w-100">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <button class="btn btn-block btn-success">Save</button>
            </div>
        </div>
    </form>
</div>