@extends('layout')

@section('title', 'Radni nalozi')

@section('content')
<style>
    .center-wrapper {
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .square-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .square {
        width: 180px;
        height: 100px;
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        transition: background-color 0.3s;
    }

    .square:hover {
        background-color: #e2e6ea;
    }

    /* Popup modal pozadina */
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        display: none; /* sakriven po defaultu */
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    /* Popup sadržaj */
    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        min-width: 250px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        position: relative;
    }

    /* Dugme za zatvaranje */
    .close-btn {
        position: absolute;
        top: 8px;
        right: 12px;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
        border: none;
        background: none;
    }

    /* Opcije unutar modala */
    .modal-buttons a {
        display: inline-block;
        margin: 10px 15px;
        padding: 8px 15px;
        border: 2px solid #007bff;
        border-radius: 5px;
        color: #007bff;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s, color 0.3s;
    }
    .modal-buttons a:hover {
        background-color: #007bff;
        color: white;
    }
</style>

<div class="container center-wrapper">
    <div class="square-container">
        @for ($i = 1; $i <= 4; $i++)
            <div class="square" data-index="{{ $i }}">
                Mašina {{ $i }}
            </div>
        @endfor
    </div>
</div>

<!-- Modal popup -->
<div class="modal-overlay" id="modal">
    <div class="modal-content">
        <button class="close-btn" id="closeModal">&times;</button>
        <h5>Izaberite dokumentaciju</h5>
        <div class="modal-buttons">
            <a href="#" id="mehanickaLink">Mehanička</a>
            <a href="#" id="elektricnaLink">Električna</a>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModal');
    const mehanickaLink = document.getElementById('mehanickaLink');
    const elektricnaLink = document.getElementById('elektricnaLink');
    let currentMasina = null;

    document.querySelectorAll('.square').forEach(square => {
        square.addEventListener('click', () => {
            currentMasina = square.getAttribute('data-index');
            // Možeš dinamički menjati linkove ako želiš, npr:
            mehanickaLink.href = `/masina/${currentMasina}/mehanicka`;
            elektricnaLink.href = `/masina/${currentMasina}/elektricna`;

            modal.style.display = 'flex';
        });
    });

    closeModalBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Klik izvan modal sadržaja zatvara popup
    window.addEventListener('click', (e) => {
        if(e.target === modal) {
            modal.style.display = 'none';
        }
    });
</script>
@endsection
