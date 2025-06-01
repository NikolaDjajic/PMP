@extends('layout')

@section('title', 'Kontakt održavanje')

@section('content')
  <style>

    h1 {
      font-family: 'Oswald', sans-serif;
      font-size: 42px;
      text-transform: uppercase;
      letter-spacing: 3px;
      margin: 0;
      color: red;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-50px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(50px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      .top-bar {
        flex-direction: column;
        align-items: center;
      }
      .title {
        margin-right: 0;
      }
      nav {
        flex-direction: column;
        align-items: center;
      }
    }

    .contact-cards {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
      padding: 60px 20px;
      animation: fadeInUp 2s ease;
    }

    .card {
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 15px;
      padding: 20px;
      width: 260px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 15px;
      border: 3px solid red;
    }

    .card h2 {
      margin: 10px 0 5px;
      font-size: 22px;
      color: #fff;
    }

    .card p {
      margin: 4px 0;
      font-size: 16px;
      color: #ddd;
    }
  </style>
</head>

 
  <div class="contact-cards">
    <div class="card">
      <img src="{{ asset('images/osoba1.jpg') }}" alt="Osoba 1">
      <h2>Amel Beganovic</h2>
      <p>Menadzer odrzavanja</p>
      <p>📞 060 123 4567</p>
      <p>✉️ a.beganovic@pmp_industries.org</p>
    </div>

    <div class="card">
      <img src="{{ asset('images/osoba2.jpg') }}" alt="Osoba 2">
      <h2>Slobodan Djukic</h2>
      <p>Elektro odrzavanje</p>
      <p>📞 061 765 4321</p>
      <p>✉️ s.djukic@pmp_industires.org</p>
    </div>

    <div class="card">
      <img src="{{ asset('images/osoba2.jpg') }}" alt="Osoba 3">
      <h2>Dejan Bebic</h2>
      <p>Masinsko odrzavanje</p>
      <p>📞 061 765 4321</p>
      <p>✉️ d.bebic@pmp_indutries.org</p>
    </div>
  </div>

</body>
@endsection