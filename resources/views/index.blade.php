@extends('template')

@section('content')
    <div id="cart">Koszyk</div>
    @foreach ($items as $item)
        <p>{{ $item->name }}</p>
        <button onclick="addToCart( {{ $item->id}} , '{{$item->name }}' );">Dodaj do koszyka</button>
    @endforeach
    {{ $items->links() }}
@endsection
