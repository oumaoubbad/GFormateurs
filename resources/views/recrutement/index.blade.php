@extends('layouts.master')

@section('content')

<style>
  /* Couleur principale */
  :root {
    --main-color: #011745;
    --hover-color: #004080;
  }

  /* Titre */
  .header-title {
    color: var(--main-color);
    font-weight: 700;
    margin-bottom: 1rem;
    text-align: center;
  }

  /* Bouton Ajouter */
  .btn-add {
    background-color: var(--main-color);
    border: none;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: background-color 0.3s ease;
    color: white;
  }
  .btn-add:hover {
    background-color: var(--hover-color);
    color: white;
  }

  /* Table styles */
  table.table {
    border-radius: 0.5rem;
    overflow: hidden;
  }
  thead {
    background-color: var(--main-color);
    color: #fff;
  }
  thead th {
    font-weight: 700;
    text-align: center;
    vertical-align: middle;
  }
  tbody td {
    vertical-align: middle;
    text-align: center;
  }

  /* Boutons actions */
  .btn-action {
    margin: 0 0.2rem;
    transition: background-color 0.3s ease;
  }
  .btn-action.delete {
    background-color: var(--main-color);
    color: #fff;
  }
  .btn-action.delete:hover {
    background-color: var(--hover-color);
    color: #fff;
  }
  .btn-action.edit {
    background-color: #0d6efd;
    color: #fff;
  }
  .btn-action.edit:hover {
    background-color: #0b5ed7;
  }
  .btn-action.users {
    background-color: #6c757d;
    color: #fff;
  }
  .btn-action.users:hover {
    background-color: #5c636a;
  }

  /* Pagination centrée */
  .pagination {
    justify-content: center !important;
  }

</style>

<div class="row">
  <div class="col-md-12">

    <div class="card border-info">
      <div class="card-header">
        <h3 class="header-title mb-0">Offres d'Emploi</h3>
      </div>

      <div class="card-body">

        <div class="mb-3 text-end">
          <a href="{{ url('/recrutement/create') }}" class="btn btn-add">
            <b>Ajouter une offre d'emploi</b>
          </a>
        </div>

        <table id="myTable" class="table table-bordered table-striped table-hover mb-0">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Contenu</th>
              <th>Compétences</th>
              <th>Ville</th>
              <th>Créé le</th>
              <th>Date Limite</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recrutements as $recrutement)
              <tr>
                <td><strong>{{ Str::limit($recrutement->titre, 20) }}</strong></td>
                <td>{{ Str::limit($recrutement->description, 30) }}</td>
                <td>{{ $recrutement->competence }}</td>
                <td>{{ $recrutement->lieu }}</td>
                <td>{{ $recrutement->created_at->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($recrutement->date_limite)->format('d/m/Y') }}</td>
                <td>
                  <form id="deleteForm-{{ $recrutement->id }}" action="{{ route('recrutement.delete', $recrutement->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-action delete" title="Supprimer">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                  <a href="{{ route('recrutement.indexcand', $recrutement->id) }}" class="btn btn-action users" title="Candidats">
                    <i class="fas fa-users"></i>
                  </a>
                  <a href="{{ route('recrutement.edit', $recrutement->id) }}" class="btn btn-action edit" title="Modifier">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
          {{ $recrutements->links() }}
        </div>

      </div>
    </div>

  </div>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" />
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

@if(Session::has('success'))
<script>
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 2000
  });
</script>
@endif
@endsection
