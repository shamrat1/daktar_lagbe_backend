<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Name in Bangla</th>
                <th>Description</th>
                <th>Description in Bangla</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->name_bn }}</td>
                    <td>{{ Str::limit($item->description,60) }}</td>
                    <td>{{ Str::limit($item->description_bn,60) }}</td>
                    <td><button><i class="fa fa-edit"></i></button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
