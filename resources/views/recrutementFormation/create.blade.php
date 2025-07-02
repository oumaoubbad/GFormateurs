@extends('layouts.master')
@section('title', 'Ajouter une offre de formation')

@section('content')
@if(auth()->user()->role)

<style>
    .form-title {
        color: #011745;
        font-weight: 700;
    }

    .form-label {
        font-weight: 600;
        color: #011745;
    }

    .form-control {
        border-radius: 0.5rem;
        box-shadow: none !important;
    }

    .btn-main {
        background-color: #011745;
        color: #fff;

    }

    .btn-main:hover {
        background-color: #004080;
    }

    .btn-secondary {
        font-weight: 600;
        border-radius: 0.5rem;
    }

    .card {
        box-shadow: 0 8px 25px rgba(1, 23, 69, 0.1);
        border: none;
        border-radius: 1rem;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 2px solid #011745;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    .alert-danger {
        border-radius: 0.5rem;
    }
</style>

<div class="row my-4">
    <div class="col-md-10 mx-auto">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Veuillez corriger les erreurs suivantes :</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header text-center">
                <h3 class="form-title">Ajouter une offre de formation</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('recrutementFormation.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" placeholder="Titre de l'offre">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ville</label>
                            <input type="text" name="lieu" class="form-control" placeholder="Ville">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Domaine</label>
                            <input type="text" name="Domaine" class="form-control" placeholder="Domaine">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fonction</label>
                            <input type="text" name="fonction" class="form-control" placeholder="Fonction">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Niveau</label>
                            <input type="text" name="niveau" class="form-control" placeholder="Niveau">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date limite</label>
                            <input type="date" name="date_limite" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Compétences</label>
                        <input type="text" name="competence" class="form-control" placeholder="Compétences">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Description de l'offre"></textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
    <a href="{{ route('recrutementFormation.index') }}" class="mx-2 btn btn-main">
        Retour
    </a>
    <button type="submit" class="mx-1 btn btn-primary" >
        Valider l'offre
    </button>
</div>

                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
