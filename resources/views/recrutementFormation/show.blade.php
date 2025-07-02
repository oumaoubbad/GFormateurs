@extends('layouts.main')

@section('title')
    Les Offres de Formation
@endsection

@section('content')

    <h3 class="text-center mb-4" style="color:#011745;">LES OFFRES DE FORMATION</h3>

    <div class="row mx-5">

        @foreach ($recrutementFormations as $recrutementFormation)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 28rem; height: 100%;"> {{-- height:100% pour s’adapter mieux --}}

                    <h2 class="mx-2 mt-3 text-center" style="color:#011745;">
                        {{ $recrutementFormation->titre }}
                    </h2>

                    <img src="/img/RF.jpg" class="mx-auto d-block mb-2" alt="Image formation" height="170" width="400">

                    <p class="mx-2 text-center">
                        <b>{{ $recrutementFormation->created_at->format('d/m/Y') }}</b>
                    </p>

                    <p class="mx-2 text-center">
                        {{ \Illuminate\Support\Str::limit($recrutementFormation->description, 60) }}
                    </p>

                    <p class="mx-2 text-center mb-1">
                        <b>Compétence :</b> {{ $recrutementFormation->competence }}
                    </p>

                    <p class="mx-2 text-center mb-1">
                        <b>Ville :</b> {{ $recrutementFormation->lieu }}
                    </p>

                    <p class="mx-2 text-center mb-3">
                        <b>Date Limite :</b> {{ \Carbon\Carbon::parse($recrutementFormation->date_limite)->format('d/m/Y') }}
                    </p>

                    {{-- Espacement clair entre le contenu et les boutons --}}
                    <div class="text-center mt-3 mb-3 d-flex justify-content-center gap-2">
                        <a href="{{ route('formateur.create', ['recrutement_id' => $recrutementFormation->id]) }}"
                           class="btn btn-primary">
                            Postuler
                        </a>
                        <a href="#" class="btn text-white" style="background-color: #011745;">
                            Voir plus
                        </a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>

@endsection
