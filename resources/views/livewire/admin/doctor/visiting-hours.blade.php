<div class="card">
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Days</th>
                <th>From</th>
                <th>To</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hours as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->days }}</td>
                    <td>{{ $item->from }}</td>
                    <td>{{ $item->to }}</td>
                    <td><button><i class="fa fa-edit"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
