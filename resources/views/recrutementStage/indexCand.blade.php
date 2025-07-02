@extends('layouts.master')

@section('content')

<style>
    :root {
        --main-color: #011745;
        --hover-color: #003366;
        --btn-primary-bg: #011745;
        --btn-primary-hover: #003366;
        --btn-secondary-bg: #6c757d;
        --btn-secondary-hover: #5a6268;
    }

    .card-custom {
        border: none;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-top: 30px;
    }

    .card-header-custom {
        background-color: white;
        border-bottom: 2px solid var(--main-color);
        color: var(--main-color);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.5rem;
    }

    .btn-return {
        background-color: var(--btn-primary-bg);
        color: white;
        font-weight: 600;
        border-radius: 0.3rem;
        transition: background-color 0.3s ease;
    }
    .btn-return:hover {
        background-color: var(--btn-primary-hover);
        color: white;
    }

    table thead {
        background-color: var(--main-color);
        color: white;
        text-align: center;
    }

    table tbody tr {
        text-align: center;
    }

    .btn-primary-custom {
        background-color: var(--btn-primary-bg);
        border: none;
        color: white;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    .btn-primary-custom:hover {
        background-color: var(--btn-primary-hover);
        color: white;
    }

    .btn-secondary-custom {
        background-color: var(--btn-secondary-bg);
        border: none;
        color: white;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    .btn-secondary-custom:hover {
        background-color: var(--btn-secondary-hover);
        color: white;
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-custom shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center card-header-custom">
                <span>Candidats à l'offre de stage</span>
                <a href="/recrutementStage/index" class="btn btn-return">
                    <i class="fas fa-arrow-left me-1"></i> Retour à la liste des offres
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Candidat</th>
                                <th>Email</th>
                                <th>CV</th>
                                <th>Postulé le</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidatStages as $candidatStage)
                            <tr>
                                <td><strong>{{ $candidatStage->nom }} {{ $candidatStage->prenom }}</strong></td>
                                <td>{{ $candidatStage->email }}</td>
                                <td>
                                    <a href="{{ route('cv.downloadCV', $candidatStage->id) }}" class="btn btn-sm btn-primary-custom">
                                        <i class="fa fa-download"></i> Télécharger
                                    </a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($candidatStage->created_at)->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('candidatStage.show', $candidatStage->id) }}" class="btn btn-sm btn-return" title="Détails">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                    <a href="{{ route('candidatStage.delete', $candidatStage->id) }}" class="btn btn-sm btn-secondary-custom" title="Supprimer">
                                        <i class="fas fa-trash"></i>
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
</div>

@endsection
