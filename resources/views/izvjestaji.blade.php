@extends('layout')

@section('title', 'Izvještaji')

@section('content')
    <div class="container">
        
    @foreach($izvjestaji as $key => $izvjestaj)
        <x-izvjestaj-one-card :izvjestaj="$izvjestaj" />
            <br>
            <br>
    @endforeach
    </div>
    
@endsection