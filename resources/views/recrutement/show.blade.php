@extends('layouts.main')
@section('title')

@endsection
@section('content')





      <h3 class="text-center "><span class="text-center"  style="color :#011745;"> LES OFFRES D'EMPLOI</span></h3>

        <div class="row mx-5"  >



        @foreach ($recrutements as $recrutement )
        <div class="col-md-4" >
        <div class="card" style="width: 30rem;  height: 350px;" >
          <h2 class="mx-2 mt-2 text-center"  style="color :#011745;">{{ $recrutement->titre}}</h2>
         <p> <p class=" mx-2 text-center"> <b>{{ $recrutement->created_at}}</b></p>
          <p class=" mx-2"> {{Str::limit($recrutement->description,60)}} </p>
          <span class=" mx-2"> <b> Compétence :</b> {{ $recrutement->competence}}</span>
            <span class=" mx-2 "><b>Ville :</b>{{ $recrutement->lieu}}</span>
            <span class=" mx-2"><b>Date Limites : </b>{{ $recrutement->date_limite}}</span>

          <div class="mx-5 d-grid gap-2 d-md-flex justyify-content-md-end mt-2">

            <button onclick="window.location.href='{{ route('recrutement.createCand', ['recrutement_id' => $recrutement->id]) }}';" class=" btn btn-primary" type="button">postuler</button>

            </div>
</br>

        </div>
         </div>
      @endforeach

</div>

@endsection


