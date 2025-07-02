@extends('layouts.master')
@section('title')

@endsection
@section('content')

@if(auth()->user()->role)

<div class="row">
<div class="col">
<!-- Page Wrapper -->
<div class="page-wrapper">
<!-- Page Content -->
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-users-center">
            <div class="col"><br>
                <h3 class="page-title"><b>Liste des candidats</b></h3>
            </div>

        </div>
    </div>

         <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                 <div class="form-group form-focus">

                    <a href="/recrutement/index" class="btn btn-primary btn-blockk1"><b> Retour à la liste des postes</b></a>


                      </div>

            </div>


        </div>
    </form>
    <!-- Search Filter -->

    <div class="row  p-4 pt-7">

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>

                            <th ><b>Candidat</b></th>
                            <th ><b>email</b></th>
                            <th><b>CV</b></th>
                            <th><b>Postuler le </b></th>
                            <th><b>Action</b></th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidats as $candidat )
                        <tr>
                            <td> <b> {{ $candidat->nom}} {{ $candidat->prenom}}</b></td>
                            <td>  {{ $candidat->email}}</td>
                            <td>
                                <a href="{{route('cv.downloadCV',$candidat->id)}}" class="btn btn-sm btn-info"><i class="fa fa-download"></i> télécharger</a>
                            </td>

                            <td>  {{ $candidat->created_at}}</td>

                            <td  class="text-center">


                                <a href="{{route('candidat.show',$candidat->id)}}" class="btn btn-outline-dark"><i class="fas fa-bars"></i></a>
                                <a href="{{route('candidat.delete',$candidat->id)}}" class="btn btn-outline-info"><i class="fas fa-trash"></i></a>
                                 <a  onclick="deleteAnnonce()" href="" class="btn btn-outline-dark"><i class="fas fa-trash-alt"></i></a>

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
</div>
</div>
@endif

@endsection

