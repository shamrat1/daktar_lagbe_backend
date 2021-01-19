<div class="row">
    <div class="col-sm-6 col-md-8">
        <div class="card rounded shadow-sm">
            <div class="card-body">
                <div class="row">
                    <h4>All Services</h4>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Features</th>
                                <th>Days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->price }}</td>
                                    <td>{{ $service->features }}</td>
                                    <td>{{ $service->days }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4">
        <div class="card rounded shadow-sm">
            <div class="card-header">
                New Service
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Name: <span class="text-danger">*</span></label>
                        </div>
                        <div class="col">
                            <input type="text" wire:model="name" style="border: 0px" placeholder="Enter Service Name" class="border-bottom border-dark">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">Name (Bangla): <span class="text-danger">*</span></label>
                        </div>
                        <div class="col">
                            <input type="text" wire:model="name_bn" style="border: 0px" placeholder="Enter Service Name BN" class="border-bottom border-dark">
                            @error('name_bn') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">Price: <span class="text-danger">*</span></label>
                        </div>
                        <div class="col">
                            <input type="number" wire:model="price" style="border: 0px" placeholder="Enter Service Price" class="border-bottom border-dark">
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">Features:</label>
                        </div>
                        <div class="col">
                            <input type="text" wire:model="features" style="border: 0px" placeholder="Enter Service Features" class="border-bottom border-dark">
                            @error('features') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">Days:</label>
                        </div>
                        <div class="col">
                            <input type="number" wire:model="days" style="border: 0px" placeholder="Ex. Staturday, Sunday" class="border-bottom border-dark">
                            @error('days') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col text-right">
                            <button class="btn btn-sm btn-success" type="button" wire:click="submit"><i class="fa fa-save"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
