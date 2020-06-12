@extends('template')

@section('content')
    Twój koszyk:
    <div id="cart">Koszyk</div>
    <button onclick="resetCart()">Wyczyść</button>
    <button onclick="checkout()">Złóż zamówienie</button>
    @foreach ($items as $item)
        <p>{{ $item->name }}</p>
        <button onclick="addToCart( {{ $item->id}} , '{{$item->name }}' );">Dodaj do koszyka</button>
    @endforeach
    {{ $items->links() }}
@endsection
