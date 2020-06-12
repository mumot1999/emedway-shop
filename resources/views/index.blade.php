@extends('template')

@section('content')
    Twój koszyk:
    <div id="cart">Koszyk</div>
    <button onclick="resetCart()">Wyczyść</button>
    <button onclick="checkout()">Złóż zamówienie</button>

    @if(session()->has('success_checkout'))
        <div class="alert alert-success">
            Checkout success
        </div>
    @endif

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
        <input name="phone" id='phone-input' value="{{old('phone')}}"/>

        <label for="email">E-mail</label>
        <input name="email" value="{{old('email')}}"/>

        <label for="nip">NIP</label>
        <input name="nip" id='nip-input' value="{{old('nip')}}"/>


    </form>
    @foreach ($items as $item)
        <div>
            <button type="button" class="btn btn-warning" onclick="addToCart( {{ $item->id}} , '{{$item->name }}' );">{{$item->name}}</button>
            <button type="button" class="btn btn-primary" onclick="addToCart( {{ $item->id}} , '{{$item->name }}' );">{{$item->price}}</button>

            <button type="button" class="btn btn-secondary" onclick="addToCart( {{ $item->id}} , '{{$item->name }}' );">Dodaj do koszyka</button>
            Pozostało: {{$item->amount}}
        </div>
    @endforeach
    {{ $items->links() }}
@endsection
