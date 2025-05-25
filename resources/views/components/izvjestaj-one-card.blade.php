@props(['izvjestaj'])

<div class="onecard-item p-4 shadow-sm" style="
    max-width: 500px;
    width: 100%;
    border-radius: 20px;
    background: linear-gradient(145deg, #f3f3f3, #ffffff);
    border: 1px solid #e0e0e0;
">
    <h3 class="mb-3 text-center" style="font-weight: bold; color: #2c3e50;">
        {{ $izvjestaj->naslov }}
    </h3>
    <p style="color: #4d4d4d; line-height: 1.6; text-align: justify;">
        {{ $izvjestaj->tekst }}
    </p>
</div>
