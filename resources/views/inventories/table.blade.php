<div class="table-responsive">
    <table class="table" id="inventories-table">
        <thead>
            <tr>
                <th>Product</th>
        <th>Stocks</th>
        <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($inventories as $inventory)
            <tr>
                <td>{{ $inventory->product }}</td>
            <td>{{ $inventory->stocks }}</td>
            <td>{{ $inventory->price }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['inventories.destroy', $inventory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('inventories.show', [$inventory->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('inventories.edit', [$inventory->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
