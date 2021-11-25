@foreach($products as $product)
    <div>{{ $loop->iteration }}.{{ $product->title }}</div>
@endforeach
