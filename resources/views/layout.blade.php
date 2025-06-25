<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: Arial, sans-serif;
      color: white;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.7);
      overflow-x: hidden;
    }

    body {
      background-image: url('{{ asset('images/slika4.png') }}');
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .top-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      animation: fadeInDown 1.5s ease-out;
    }

    .logo {
      height: 60px;
      width: auto;
    }

    .title {
      text-align: center;
      flex-grow: 1;
      margin-right: 100px;
    }

    h1 {
      font-family: 'Oswald', sans-serif;
      font-size: 42px;
      text-transform: uppercase;
      letter-spacing: 3px;
      margin: 0;
      color: red;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
    }

    .underline {
      width: 160px;
      height: 4px;
      background-color: red;
      margin: 10px auto 30px auto;
      border-radius: 2px;
    }

    nav {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      animation: fadeInUp 2s ease-out;
      justify-content: center;
    }

    nav a {
      text-decoration: none;
      color: white;
      background: linear-gradient(45deg, #555 50%, #c00 50%);
      background-size: 200% 100%;
      background-position: left bottom;
      padding: 10px 14px;
      border-radius: 8px;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    nav a:hover {
      background-position: right bottom;
      transform: scale(1.05);
    }

    /* Novi kontejner za dugmad desno gore */
    .top-right-buttons {
      position: absolute;
      top: 20px;
      right: 30px;
      display: flex;
      gap: 10px;
      align-items: center;
      z-index: 1000;
    }

    /* Stilovi za sva tri dugmeta u top-right-buttons */
    .language-btn,
    .logout-btn,
    .users-btn {
      padding: 10px 15px;
      font-size: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
      background-color: #444;
      color: white;
      text-decoration: none; /* za link */
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .language-btn:hover,
    .logout-btn:hover,
    .users-btn:hover {
      background-color: #c00;
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
      /* Da dugmad ne izlaze van na mobilnom */
      .top-right-buttons {
        position: static;
        margin-top: 10px;
        justify-content: center;
      }
    }

    .fixed-footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 80px;
      background-color: rgba(0, 0, 0, 0.7);
      color: white;
      text-align: center;
      z-index: 999;
    }
  </style>
</head>

<body>

  <script>
    let isSerbian = true;

    const translations = {
      sr: [
        "POCETNA", "RADNI NALOZI", "ZAPOSLENI", "IZVJESTAJI",
        "ISTORIJA KVAROVA", "PRIJAVI KVAR I RJESENJE",
        "SASTANCI", "ODRZAVANJE OPREMA", "KONTAKT ODRZAVANJE"
      ],
      en: [
        "HOME", "WORK ORDERS", "EMPLOYEES", "REPORTS",
        "FAILURE HISTORY", "REPORT FAILURE & SOLUTION",
        "MEETINGS", "EQUIPMENT MAINTENANCE", "MAINTENANCE CONTACT"
      ]
    };

    function toggleLanguage() {
      const buttons = document.querySelectorAll(".btn-text");
      buttons.forEach((btn, i) => {
        btn.textContent = isSerbian ? translations.en[i] : translations.sr[i];
      });
      isSerbian = !isSerbian;
    }
  </script>

  {{-- HEADER --}}
  <header>
    <div class="top-bar">
      <img src="{{ asset('images/Untitled1.png') }}" alt="Logo" class="logo">
      <div class="title">
        <h1>@yield('title', '')</h1>
        <div class="underline"></div>
      </div>
    </div>

    <div class="top-right-buttons">
      <button class="language-btn" onclick="toggleLanguage()">ENG/SRP</button>

      <a href="{{ url('/korisnici') }}" class="users-btn">KORISNICI</a>
      <a href="{{ url('/masine') }}" class="users-btn">MASINE</a>
      <form method="GET" action="{{ route('logout') }}" style="display: inline;">
        <button type="submit" class="logout-btn">ODJAVI SE</button>
      </form>
    </div>

    <nav>
      <a href="{{ url('/pocetna') }}" class="btn-text">POČETNA</a>
      <a href="{{ url('/radni_nalozi') }}" class="btn-text">RADNI NALOZI</a>
      <a href="{{ url('/zaposleni') }}" class="btn-text">ZAPOSLENI</a>
      <a href="{{ url('/izvjestaji') }}" class="btn-text">IZVJEŠTAJI</a>
      <a href="{{ url('/istorija_kvarova') }}" class="btn-text">ISTORIJA KVAROVA</a>
      <a href="{{ url('/prijavi_kvar_i_rjesenje') }}" class="btn-text">PRIJAVI KVAR I RJEŠENJE</a>
      <a href="{{ url('/sastanci') }}" class="btn-text">SASTANCI</a>
      <a href="{{ url('/odrzavanje_oprema') }}" class="btn-text">ODRŽAVANJE OPREMA</a>
      <a href="{{ url('/kontakt_odrzavanje') }}" class="btn-text">KONTAKT ODRŽAVANJE</a>
    </nav>
  </header>

  {{-- SADRŽAJ --}}
  <main>
    @yield('content')
  </main>

  <footer class="fixed-footer">
    <br>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>
            Copyright © 2020 Company Name
            - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
