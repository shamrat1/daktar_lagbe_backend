<div class="col mt-4">
    <h5>All Divisions</h5>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($divisions as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                    <button wire:click="edit('{{ $item->id }}')" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button wire:click="delete('{{ $item->id }}')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>