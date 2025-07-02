@extends('layouts.master')

@section('content')

<style>
    :root {
        --main-color: #011745;
        --hover-color: #004080;
        --accent-color: #0d6efd;
        --light-bg: #f8f9fa;
    }

    .section-header {
        background-color: var(--main-color);
        color: white;
        padding: 20px 30px;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .section-header h3 {
        margin: 0;
        font-weight: 700;
    }

    .btn-return {
        background-color: var(--accent-color);
        font-weight: 600;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn-return:hover {
        background-color: #0056b3;
        color: white;
    }

    .card-custom {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        margin-top: 30px;
    }

    .table thead {
        background-color: var(--main-color);
        color: white;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
    }

    .btn-action {
        margin: 0 2px;
        font-weight: 600;
    }

    .btn-primary {
        background-color: var(--main-color);
        border-color: var(--main-color);
    }

    .btn-primary:hover {
        background-color: var(--hover-color);
        border-color: var(--hover-color);
    }

</style>

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card shadow-sm mt-4">
    <div class="card-body bg-white d-flex justify-content-between align-items-center">
        <h3 class="mb-0" style="color: #011745; text-color:#fff;"><strong>Candidats à l'offre d'emploi</strong></h3>
        <a href="/recrutement/index" class="btn text-white" style="background-color: #011745;">
            <i class="fas fa-arrow-left me-1"></i> Retour aux offres
        </a>
    </div>
</div>
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><b>Candidat</b></th>
                            <th><b>Email</b></th>
                            <th><b>CV</b></th>
                            <th><b>Date de candidature</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidats as $candidat)
                        <tr>
                            <td><b>{{ $candidat->nom }} {{ $candidat->prenom }}</b></td>
                            <td>{{ $candidat->email }}</td>
                            <td>
                                <a href="{{ route('cv.downloadCV', $candidat->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-download"></i> Télécharger
                                </a>
                            </td>
                            <td>{{ $candidat->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('candidat.show', $candidat->id) }}" class="btn btn-sm btn-dark btn-action" title="Détails">
                                    <i class="fas fa-bars"></i>
                                </a>
                                <a href="{{ route('candidat.delete', $candidat->id) }}" class="btn btn-sm btn-danger btn-action" title="Supprimer">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    $(document).ready(function () {
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
</script>
@endif
@endsection
