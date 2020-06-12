@extends('template')

@section('content')
    Twój koszyk:
    <div id="cart">Koszyk</div>
    <button onclick="resetCart()">Wyczyść</button>
    <button onclick="checkout()">Złóż zamówienie</button>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="checkout-form" method="post">
        {{csrf_field()}}
        <label for="name">Imię</label>
        <input name="name" value="{{old('name')}}"/>

        <label for="street">Ulica</label>
        <input name="street" value="{{old('street')}}"/>

        <label for="postcode">Kod pocztowy</label>
        <input name="postcode" value="{{old('postcode')}}"/>

        <label for="phone">Numer telefonu</label>
        <input name="phone" value="{{old('phone')}}"/>

        <label for="email">E-mail</label>
        <input name="email" value="{{old('email')}}"/>

        <label for="nip">NIP</label>
        <input name="nip" value="{{old('nip')}}"/>


    </form>
    @foreach ($items as $item)
        <p>{{ $item->name }}</p>
        <button onclick="addToCart( {{ $item->id}} , '{{$item->name }}' );">Dodaj do koszyka</button>
    @endforeach
    {{ $items->links() }}
@endsection
