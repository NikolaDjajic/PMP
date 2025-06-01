@extends('layout')

@section('title', 'Izvještaji')

@section('content')
<div class="container-fluid" style="padding-top: 40px; min-height: 80vh;">
  <div class="wrapper">

    {{-- Dugme za otvaranje modala --}}
    <div style="text-align: center;">
  <div style="display: inline-block;">
    <button id="dugme-dodaj" onclick="prikaziFormu()" class="btn-text">
        Dodaj izvještaj
    </button>
  </div>
</div>
<br>
<br>
   <style>
  .btn-text, .btn-text2 {
    text-decoration: none;
    color: white;
    background: linear-gradient(45deg, #555 50%, #c00 50%);
    background-size: 200% 100%;
    background-position: left bottom;
    padding: 10px 14px;
    border-radius: 8px;
    font-size: 15px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .btn-text2 {
    background: linear-gradient(45deg, #555 50%, #0c0 50%);
  }

  .btn-text:hover, .btn-text2:hover {
    background-position: right bottom;
    transform: scale(1.05);
  }

  #forma-za-objavu .card {
    text-align: left;
    padding-top: 20px !important;
  }

  #forma-za-objavu h4 {
    margin-bottom: 20px;
    margin-top: 0;
    text-align: center;
  }

  textarea.form-control {
    min-height: 150px;
    min-width: 550px;
    resize: vertical;
  }

  .form-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
  }
  label.form-label {
  display: block;
  margin-bottom: 6px;
}
.form-control-file {
  flex: 1;
}

label.form-label {
  display: block;
  margin-bottom: 6px;
}

.d-flex {
  display: flex;
}

.me-2 {
  margin-right: 0.5rem;
}

.mb-0 {
  margin-bottom: 0;
}

  
</style>

<div style="text-align: center;">
  <div id="forma-za-objavu" style="display: none;">
    <div class="card p-4 shadow-sm mb-5">
      <h4>Dodaj novi izvještaj</h4>

      <form action="{{ route('objava.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="opis" class="form-label">Opis:</label>
            <textarea name="opis" id="opis" class="form-control" rows="6" required></textarea>
        </div>
<br>
        <div class="mb-3 d-flex align-items-center">
  <label for="fajl" class="form-label me-2 mb-0">Dodaj fajl:</label>
  <input type="file" name="fajl" id="fajl" class="form-control-file">
</div>
<br>
<div class="mb-3">
  <label for="masina" class="form-label">Odaberite mašinu:</label>
  <select name="masina" id="masina" class="form-select" required>
    <option value="" disabled selected>-- Odaberite mašinu --</option>
    <option value="masina1">Mašina 1</option>
    <option value="masina2">Mašina 2</option>
    <option value="masina3">Mašina 3</option>
  </select>
</div>
<br>
        <div class="form-buttons mt-4">
         <button type="button" class="btn-text" onclick="sakrijFormu()">Otkaži</button>
          <button type="submit" class="btn-text2">Sačuvaj</button>
        </div>
      </form>
    </div>
  </div>
</div>

<br>
<br>
    {{-- Prikaz izvještaja --}}
    @foreach($izvjestaji as $izvjestaj)
      <div class="mb-4">
        <x-izvjestaj-one-card :izvjestaj="$izvjestaj" />
      </div>
    @endforeach

  </div>
</div>

<style>
  .wrapper {
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
  }

  .btn-text {
  text-decoration: none;
  color: white;
  background: linear-gradient(45deg, #555 50%, #c00 50%);
  background-size: 200% 100%;
  background-position: left bottom;
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 15px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-block;
}

.btn-text:hover {
  background-position: right bottom;
  transform: scale(1.05);
}
#forma-za-objavu {
  background-color: rgba(85, 80, 80, 0.5); /* poluprovidna crna */
  padding: 30px;
  border-radius: 10px;
}
.btn-text2 {
  text-decoration: none;
  color: white;
  background: linear-gradient(45deg, #555 50%, #0c0 50%);
  background-size: 200% 100%;
  background-position: left bottom;
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 15px;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-block;
}

.btn-text2:hover {
  background-position: right bottom;
  transform: scale(1.05);
}
</style>

<script>
  function prikaziFormu() {
    document.getElementById('forma-za-objavu').style.display = 'block';
    document.getElementById('dugme-dodaj').style.display = 'none';
  }

  function sakrijFormu() {
    document.getElementById('forma-za-objavu').style.display = 'none';
    document.getElementById('dugme-dodaj').style.display = 'inline-block';
  }
</script>
@endsection
