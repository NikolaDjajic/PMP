@extends('layout')

@section('title', 'Korisnici')

@section('content')

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
.swal2-border-radius {
  border-radius: 10px !important;
}

/* Crvena boja kruga i uzvičnika */
.swal2-icon.swal2-warning {
  border-color: #c0392b !important;
  color: #c0392b !important;
}

.swal2-icon.swal2-warning .swal2-icon-content {
  color: #c0392b !important;
}

/* SVG element fill (za neke verzije) */
.swal2-icon.swal2-warning svg {
  fill: #c0392b !important;
}
</style>


<div class="container-fluid" style="padding-top: 40px; min-height: 80vh;">
  <div class="wrapper">

    {{-- Dugme za otvaranje modala --}}
    <div style="text-align: center;">
  <div style="display: inline-block;">
    <button id="dugme-dodaj" onclick="prikaziFormu()" class="btn-text">
        Dodaj novu masinu
    </button>
  </div>
</div>

{{-- otvoren modal --}}

<div style="text-align: center;">
  <div id="forma-za-objavu" style="display: none;">
    <div class="card p-4 shadow-sm mb-5">
      <h4>Dodaj novu masinu</h4>

      <form action="{{ route('masine.store') }}" method="POST">
        @csrf
        
        <div class="mb-3" style="text-align: center;">
          <label for="naziv" class="form-label">Naziv masine:</label>
          <input type="text" name="naziv" id="naziv" class="form-control" required>
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

{{-- TABELA --}}

<table style="width: 90%; max-width: 1000px; background-color: rgba(0,0,0,0.6); color: white; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: rgba(255,255,255,0.1);">
            <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Naziv</th>
            <th style="padding: 10px; border: 1px solid #ccc;">Datum kreiranja</th>
            <th style="padding: 10px; border: 1px solid #ccc;"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($masinas as $masina)
            <tr>
                <td style="padding: 8px; border: 1px solid #ccc;">{{ $masina->id }}</td>
                <td style="padding: 8px; border: 1px solid #ccc;">{{ $masina->naziv }}</td>
                <td style="padding: 8px; border: 1px solid #ccc;">{{ $masina->created_at }}</td>
                <td style="padding: 8px; border: 1px solid #ccc;">
                   <form id="delete-form-{{ $masina->id }}" action="{{ route('masine.delete', $masina->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="button"
                              onclick="confirmDelete({{$masina->id}},'{{ $masina->naziv }}')"
                              style="background-color: #c0392b; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">
                          Obriši
                      </button>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
  function prikaziFormu() {
    document.getElementById('forma-za-objavu').style.display = 'block';
    document.getElementById('dugme-dodaj').style.display = 'none';
  }

  function sakrijFormu() {
    document.getElementById('forma-za-objavu').style.display = 'none';
    document.getElementById('dugme-dodaj').style.display = 'inline-block';
  }

    function confirmDelete(id,naziv) {
        Swal.fire({
            title: 'Da li ste sigurni da želite da obrišete mašinu <b>' + naziv + '</b>?',
            icon: 'warning',
            background: '#2c3e50', // tamna pozadina
            color: '#ecf0f1', // svetao tekst
            showCancelButton: true,
            confirmButtonColor: '#c0392b', // crveno dugme
            cancelButtonColor: '#6c757d',  // sivo dugme
            confirmButtonText: 'Da, obriši',
            cancelButtonText: 'Otkaži',
            customClass: {
                popup: 'swal2-border-radius',
                icon: 'swal2-custom-icon'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

@endsection