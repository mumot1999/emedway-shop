@extends('template')

@section('content')
    @foreach ($items as $item)
        <p>{{ $item->name }}</p>
    @endforeach
@endsection
