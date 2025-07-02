@extends('layouts.master')
@section('title')

@endsection
@section('content')
@if(auth()->user()->role) 
<div class="container bg-white mt-5 my-5">
<div class="card my-5 mx-5">
        <h3 class="text-center mt-3"><b>formulaire de création d'un nouvel employé</b></h3> 
    <h4 class="text-center">INFORMATION DE CONTACT</h4>
    <hr class="hr2">
    <h5 class="mx-4 text-center">
    {{ $candidat->created_at}} </br>
    </h5>
    <h3 class="mx-4 ">
    {{ $candidat->prenom}} {{ $candidat->nom}} </br>
    </h3>
 
    <div class="row mx-3">
    <div class="col-md-6">
        <span >Date de naissance : {{ $candidat->date_naissance}} </span>
      
    </div>
    <div class="col-md-6">
        <span >Numero de Telephone : {{ $candidat->tel}}</span>
    </div>
    </div>
    <div class="row mx-3">
    <div class="col-md-6">
        <span >Adresse email : {{ $candidat->email}}</span>
    </div>

    <div class="col-md-6">
        <span >CV : <a href="{{route('cv.downloadCV',$candidat->id)}}" class="btn  btn-secondary"><i class="fa fa-download"></i> <b>télécharger</b> </a> </span>
    </div>
    </div>

    <hr class="hr2">
    <br>
    <div class="row mx-3">
    <div class="col-md-6">
        <span >Niveau d'étude : {{ $candidat->niveauEtude}} </span>
    </div>
    <div class="col-md-6">
        <span >Diplome : {{ $candidat->diplome}} </span>
    </div>
    </div>

<div class="row mx-3">
    <div class="col-md-8">
        <p >les expériences : {{ $candidat->descriptionExperience}} </p>
    </div>
    </div>
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
     <div class="col-md-2">
     <a href="{{route('cv.downloadCV',$candidat->id)}}" class="btn  text-white" style="background-color: #011745;"> <i class="fa fa-download"></i> <b>cv</b> </a>
        <a href="{{ url('/recrutement/candidat/6') }}" class="btn btn-primary"><b>Retour</b></a>
        </div>
    </div>
    </br></br>
    </div>
    </div>


@endif
@endsection


