@extends('layout')

@section('title', 'Nova objava')

@section('content')
    <div class="container mt-4">
        <h4>Nova objava</h4>

        <form action="{{ route('objava.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Opis:</label>
                <textarea name="opis" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label>Fajl:</label>
                <input type="file" name="fajl" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="window.close()">Otkaži</button>
                <button type="submit" class="btn btn-success">Sačuvaj</button>
            </div>
        </form>
    </div>
@endsection