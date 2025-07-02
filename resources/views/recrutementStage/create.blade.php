@extends('layouts.master')
@section('title')

@endsection
@section('content')
@if(auth()->user()->role) 

 <div class="row ">
    <div class="col-md-8 mx-auto">

                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h3 class="card-title  text-center" style=" color: #011745;">
                        <b>Ajouter une offre de stage</b>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('recrutementStage.store')}}" methode="post">
                @csrf
                    <div class="mb-3">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="titre" placeholder="title">
                      </div>





                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="description"></textarea>
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Compétences</label>
                        <input type="text" class="form-control" name="competence" placeholder="competence">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ville </label>
                        <input type="text" class="form-control" name="lieu" placeholder="lieu">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Domaine </label>
                        <input type="text" class="form-control" name="Domaine" placeholder="lieu">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">fonction </label>
                        <input type="text" class="form-control" name="fonction" placeholder="lieu">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">niveau </label>
                        <input type="text" class="form-control" name="niveau" placeholder="lieu">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Date limite</label>
                        <input type="date" class="form-control" name="date_limite" placeholder="date_limite">
                      </div>






{{--   <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div> --}}


                     
                        <a  href="/recrutementStage/index " type="submit" class="btn btn-primary"><b>Retour</b></a>

                        <button class="btn text-white" style=" background-color: #011745;"><b>Valider</b></button>





                   </div>

                </form>

        </div>
    </div>
 </div>
</div>

 {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
 <script type="text/javascript">
     $(document).ready(function() {
        $('.ckeditor').ckeditor();
     });
 </script> --}}


@endif

@endsection
















