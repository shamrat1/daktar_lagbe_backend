<div class="row">
    <div class="col-sm-6 col-md-8 col-lg-8">
        <div class="card rounded shadow-sm">
            <div class="card-header">
                <h5>New Test Facility</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Name(BN)</th>
                            <th>Price (&#2547;)</th>
                            <th>Features</th>
                            <th>Extra</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tests as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name_bn }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ Str::limit($item->features,50) }}</td>
                                <td>{{ Str::limit($item->extra,50) }}</td>
                                <td>
                                    <button wire:click="edit($item->id)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button wire:click="delete($item->id)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="7">No Data Found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="card rounded shadow-sm">
            <div class="card-header">
                <h5>New Test Facility</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" wire:model.lazy="name" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="form-group">
                    <label for="">Name (BN)</label>
                    <input type="text" wire:model.lazy="name_bn" class="form-control">
                    @error('name_bn') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" wire:model.lazy="price" class="form-control">
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="">Features</label>
                    <textarea wire:model.lazy="features" class="form-control" id="" cols="30"></textarea>
                    @error('features') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="">Extra</label>
                    <textarea wire:model.lazy="extra" class="form-control" id="" cols="30"></textarea>
                    @error('extra') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-sm bg-gray" type="reset"><i class="fa fa-times"></i></button>
                <button class="btn btn-sm btn-success" type="button" wire:click="store"><i class="fa fa-save"></i></button>
            </div>
        </div>
    </div>
</div>
