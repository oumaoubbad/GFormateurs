@extends('layouts.master')

@section('content')
<style>
body, .container, .row {
  margin-top: 0 !important;
  padding-top: 0 !important;
}
  /* Conteneur principal */
  .content-header h2 {
    color: #011745;
    font-weight: 700;
  }

  /* Carte avec ombre et arrondi */
  .card-body {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgb(1 23 69 / 0.15);
    padding: 2rem;
    margin-top: 0rem;
  }

  /* Labels du formulaire */
  label {
    font-weight: 600;
    color: #011745;
  }

  /* Bouton filtre */
  .btn-primary {
    background-color: #011745;
    border: none;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: background-color 0.3s ease;
  }
  .btn-primary:hover, .btn-primary:focus {
    background-color: #004080;
  }

  /* Tableau styling */
  table.table {
    border-radius: 12px;
    overflow: hidden;
  }
  table thead {
    background-color: #011745;
    color: white;
  }
  table thead th {
    font-weight: 700;
    text-align: center;
  }
  table tbody td, table tbody th {
    vertical-align: middle !important;
    text-align: center;
  }

  /* Boutons d'action */
  .btn-primary, .btn.text-white {
    transition: background-color 0.3s ease;
  }
  .btn-primary:hover {
    background-color: #004080;
  }
  .btn.text-white:hover {
    background-color: #004080 !important;
  }

  /* Pagination centré */
  .pagination {
    justify-content: center;
  }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="content-header d-flex justify-content-center align-items-center pb-2 border-bottom">
      <h2>Liste des Formateurs</h2>
    </div>

    <div class="card-body">
      <form method="GET" action="">
        <div class="row g-3">
          <div class="col-md-3">
            <label for="demaine">Filtrer par Domaines d'expertise</label>
            <select class="form-select" name="demaine" id="demaine">
              <option value="">Sélectionner domaine</option>
              <option value="1" {{ Request::get('demaine') == '1' ? 'selected' : '' }}>One</option>
              <option value="2" {{ Request::get('demaine') == '2' ? 'selected' : '' }}>Two</option>
              <option value="3" {{ Request::get('demaine') == '3' ? 'selected' : '' }}>Three</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="spec">Filtrer par Spécialités</label>
            <select class="form-select" name="spec" id="spec">
              <option value="">Sélectionner spécialité</option>
              <option value="1" {{ Request::get('spec') == '1' ? 'selected' : '' }}>One</option>
              <option value="2" {{ Request::get('spec') == '2' ? 'selected' : '' }}>Two</option>
              <option value="3" {{ Request::get('spec') == '3' ? 'selected' : '' }}>Three</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="dispo">Filtrer par géographique</label>
            <select class="form-select" name="dispo" id="dispo">
              <option value="">Sélectionner disponibilité</option>
              <option value="1" {{ Request::get('dispo') == '1' ? 'selected' : '' }}>One</option>
              <option value="2" {{ Request::get('dispo') == '2' ? 'selected' : '' }}>Two</option>
              <option value="3" {{ Request::get('dispo') == '3' ? 'selected' : '' }}>Three</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="exp">Filtrer par Années d'expériences</label>
            <select class="form-select" name="exp" id="exp">
              <option value="">Sélectionner années d'expériences</option>
              <option value="Moins de 5 ans" {{ Request::get('exp') == 'Moins de 5 ans' ? 'selected' : '' }}>Moins de 5 ans</option>
              <option value="Entre 5 et 10 ans" {{ Request::get('exp') == 'Entre 5 et 10 ans' ? 'selected' : '' }}>Entre 5 et 10 ans</option>
              <option value="Plus de 10 ans" {{ Request::get('exp') == 'Plus de 10 ans' ? 'selected' : '' }}>Plus de 10 ans</option>
            </select>
          </div>
        </div>

        <div class="d-grid gap-2 col-md-4 mx-auto mt-3">
          <button type="submit" class="btn btn-primary">Filtrer</button>
        </div>
      </form>

      <hr>

      <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom & prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Domaines d'expertise</th>
            <th>Spécialité</th>
            <th>Disponibilité géographique</th>
            <th>Années d'expériences</th>
            <th>CV</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($formateurs as $key => $formateur)
          <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $formateur->nom }} {{ $formateur->prenom }}</td>
            <td>{{ $formateur->email }}</td>
            <td>{{ $formateur->tel }}</td>
            <td>{{ $formateur->demaine }}</td>
            <td>{{ $formateur->spec }}</td>
            <td>{{ $formateur->dispo }}</td>
            <td>{{ $formateur->exp }}</td>
            <td class="text-center">
              <a href="{{ route('cv.downloadCV', $formateur->id) }}" class="btn btn-sm text-white" style="background-color: #011745;" title="Télécharger CV">
                <i class="fa fa-download"></i>
              </a>
            </td>
            <td class="text-center">
              <a class="btn btn-primary btn-sm" href="{{ route('formateurs.show', $formateur->id) }}" title="Voir détails">
                <i class="fa fa-eye"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="d-flex justify-content-center mt-4">
        {{ $formateurs->links() }}
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      dom: 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
  });
</script>

@if(Session()->has('success'))
<script>
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: "{{ Session()->get('success') }}",
    showConfirmButton: false,
    timer: 2000
  });

  function myFunction() {
    if (!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
</script>
@endif
@endsection
