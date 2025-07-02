@extends('layouts.master')
@section('title')

@endsection
@section('content')
@if(auth()->user()->role)

<div class="card  mt-5  mx-5">
  <div class="row">
  <div class="col-md-4 "  style=" background-color: #011745;">
  <h3 class=" text-center text-white mt-5">{{ $formateur->nom }} {{ $formateur->prenom }}</h3>

  <th><img src="/images/{{ $formateur->photo }}" class="rounded-circle mx-auto d-block mt-2" width="250px" height="200px"></th>
<div class="row  text-light">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
            <div class="form-group">
            <i class="fa fa-envelope" aria-hidden="true"></i> :</strong>
                {{ $formateur->email }}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
                <strong><i class="fa fa-phone" aria-hidden="true"></i> :</strong>
                {{ $formateur->tel }}
            </div>
        </div>


    </div>


</div>
  <div class="col-md-8">
  <div class="card-title mt-2 text-center">
  <h3  style="color :#011745;"> Détaille de {{ $formateur->nom }} {{ $formateur->prenom }} </h3>
  </div>
   <div class="card-body">

<div class="row  mt-2">
  <div class="col-md-6">
  Spécialités :</strong>
                {{ $formateur->spec }}
            </div>
  <div class="col-md-6">
  Disponibilité géographique :</strong>
                {{ $formateur->exp }}
            </div>
</div>
<div class="row">
<div class="col-md-6">
  Domaines d'expertise:</strong>
                {{ $formateur->demaine }}
</div>
<div class="col-md-6">
<div class="col-md-6">
Disponibilité géographique:</strong>
                {{ $formateur->dispo }}
</div>
</div>
</div>
<div class="row ">
<div class="col-md-6">

                <strong>CIN Recto:</strong></br>
                <img src="/images/{{ $formateur->recto }}" width="300px" height="170px">
</div>
<div class="col-md-6">

                <strong>CIN Vecto:</strong></br>
                <img src="/images/{{ $formateur->vecto }}" width="300px" height="170px">

</div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
    <strong>CV :</strong> </br>
    <strong>Attestation :</strong> </br>
    <strong>Diplolme :</strong>

    </div>
    <div class="col-md-6">
    <th> <a  href="{{route('cv.downloadCV',$formateur->id)}}" ><i class="fa fa-download"></i> telecharger cv</a></th> </br>
    <th> <a  href="{{route('attes.downloadAttes',$formateur->id)}}"><i class="fa fa-download"> </i>telecharger attestation</a></th> </br>
    <th> <a  href="{{route('diplome.downloadDiplome',$formateur->id)}}"><i class="fa fa-download"> </i>telecharger diplome</a></th> </br>
    </div>
</div>
</div>
</div>









</div>

</div>
@endif
@endsection
