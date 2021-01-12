<div class="card">
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Type</th>
                <th>Fee</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fees as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->fee }}</td>
                    <td><button class="btn btn-warning"><i class="fa fa-edit"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
