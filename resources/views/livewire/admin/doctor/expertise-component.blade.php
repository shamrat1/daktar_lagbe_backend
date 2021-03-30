<div class="row">
    <div class="col-7">
        <div class="card rounded shadow">
            <div class="card-body">
                <div class="col-12 mb-2 p-3 text-center bg-dark text-white rounded">
                    <h5>Expertize</h5>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Name(BN)</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($expertises as $expert)
                            <tr>
                                <td>{{$expert->id}}</td>
                                <td>{{$expert->name}}</td>
                                <td>{{$expert->name_bn}}</td>
                                <td>{{Str::limit($expert->description,30)}}</td>
                                <td><button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Expertize are listed</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card rounded shadow-sm">
            <div class="card-body">
                <div class="col-12 mb-2 p-3 text-center bg-dark text-white rounded">
                    <h5>New Expertize</h5>
                </div>
                <form class="form">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" wire:model.lazy="name" placeholder="Enter Expertize Name">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name(BN)</label>
                        <input type="text" class="form-control" wire:model.lazy="nameBn" placeholder="Enter Expertize Name(BN)">
                        @error('nameBn') <small class="text-danger">{{$message}}</small> @enderror

                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea wire:model.lazy="description" class="form-control" id="" cols="30" rows="5"></textarea>
                        @error('description') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <hr>

                    <div class="text-right">
                        <button type="reset" class="btn btn-sm"><i class="fa fa-times"></i></button>
                        <button wire:click="save" type="button" class="btn btn-sm btn-success"><i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
