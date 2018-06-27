@extends('layout');

@section('content')
    @if(Auth::user())
        <h3> Hoşgeldin {{ ucwords(Auth::user()->name)}} </h3>
    @else
        <h3>Right Aligned Navbar</h3>
        <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
    @endif
@endsection