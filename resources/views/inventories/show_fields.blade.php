<!-- Product Field -->
<div class="col-sm-12">
    {!! Form::label('product', 'Product:') !!}
    <p>{{ $inventory->product }}</p>
</div>

<!-- Stocks Field -->
<div class="col-sm-12">
    {!! Form::label('stocks', 'Stocks:') !!}
    <p>{{ $inventory->stocks }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $inventory->price }}</p>
</div>

