@props(['izvjestaj'])

<div class="mb-4 shadow-sm" style="
    background-color: #2b2b2b;
    color: #f1f1f1;
    border-left: 4px solid #cc0000;
    border-radius: 12px;
    padding: 16px;
    position: relative;
">

    {{-- Gornja traka sa datumom i korisnikom --}}
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
        <small style="color:  #d32f2f; font-size: 20px;">👤 {{ $izvjestaj->user->username ?? 'Nepoznat korisnik' }}</small>
        <small style="color: #aaa;">{{ $izvjestaj->created_at->format('d.m.Y. H:i') }}</small>
    </div>

    {{-- Opis --}}
    <p> {{ $izvjestaj->opis }}</p>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
    <p>Mašina: <strong class="text-light">{{ $izvjestaj->masina->naziv ?? 'Nepoznata mašina' }}</strong></p>

    {{-- Dugme za preuzimanje (donji desni ugao) --}}

        <a href="{{ asset('storage/' . $izvjestaj->fajl) }}" class="c-btn" download>
            <span class="c-btn__label">
                Preuzmi fajl
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 1V11M8 11L4 7M8 11L12 7M2 15H14" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
        </a>
    </div>
</div>


<style>

:root {
    --color-dark: #1e1e1e;           /* Tamnosiva pozadina */
    --color-primary: #cc0000;        /* Crvena kao primarna boja */
    accent-color: var(--color-primary);
}

body {
    font-family: system-ui;
    height: 100vh;
    background-color: var(--color-dark);
}

a {
    color: var(--color-primary);
    text-decoration: none;
}

.c-btn {
    position: relative;
    overflow: hidden;
    padding: 0.6rem 1.2rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;

    color: var(--color-primary);
    text-decoration: none;

    border-radius: 8px;
    background-color: transparent;
    box-shadow: inset 0 0 0 1px var(--color-primary);
    transition: all 0.3s ease;
}

.c-btn__label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    z-index: 2;
    font-size: 0.95rem;
    transition: color 0.3s ease-in-out;
}

.c-btn::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 120%;
    height: 120%;
    background-color: var(--color-primary);
    border-radius: 20%;
    transform: scale(0) translateY(100%);
    transition: transform 0.4s ease-in-out;
    z-index: 1;
}

.c-btn:hover::after {
    transform: scale(1.5) translateY(0);
    border-radius: 50%;
}

.c-btn:hover .c-btn__label {
    color: var(--color-dark);
}



</style>
