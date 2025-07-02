@extends('layouts.main')
@section('title')

@endsection
@section('content')





<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">

    <div class="w3-display-middle text-center">
      <span class="w3-text-white" style="font-size:25px">Remplissez ce formulaire afin d'envoyer vos demandes</span>
    </div>
 
  </header>




  <div class="row my-4">
    <div class="col-md-8 mx-auto">



        <div class="card">

            <div class="card-body">
                <form action="{{ route('candidatStage.storecandidatStage')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="recrutement_id" value="{{ $recrutement_id }}">
                <div class="mb-3">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><b>Nom</b></label>
                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                      </div>
                    </div>

                    <div class="form-group flex-grow-1">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"><b>Prénom</b></label>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                      </div>
                    </div></div>

                    <div class="mb-3">
                        <div class="d-flex">
                            <div class="form-group flex-grow-1 mr-2">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><b>Date naissance</b></label>
                            <input type="date" class="form-control" name="date_naissance" placeholder="Date naissance">
                          </div>
                        </div>

                        <div class="form-group flex-grow-1">
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><b>Adresse email</b></label>
                            <input type="text" class="form-control" name="email" placeholder="Adresse email">
                          </div>
                        </div></div>

                        <div class="mb-3">
                            <div class="d-flex">
                                <div class="form-group flex-grow-1 mr-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b>Numéro de téléphone</b></label>
                                <input type="text" class="form-control" name="tel" placeholder="Numéro de téléphone">
                              </div>
                            </div>

                            <div class="form-group flex-grow-1">
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><b>CV</b></label>
                                <input type="file" class="form-control" name="cv" placeholder="CV">
                              </div>
                            </div></div>

                            <div class="mb-3">
                                <div class="d-flex">
                                    <div class="form-group flex-grow-1 mr-2">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Niveau d'étude</b></label>
                                    <input type="text" class="form-control" name="niveauEtude" placeholder="Niveau d'étude">
                                  </div>
                                </div>

                                <div class="form-group flex-grow-1">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"><b>Diplome</b></label>
                                    <input type="text" class="form-control" name="diplome" placeholder="Diplome">
                                  </div>
                                </div></div>

                                    <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><b>Expériance</b></label>
                            <textarea type="text" class="form-control" name="descriptionExperience" placeholder="Expériance"></textarea>
                          </div>

                      <div class="card-footer">
                        <a  href="/recrutementStage/show" type="submit" class="btn btn-outline-dark"><b>Retour</b></a>

                        <button class="btn btn-outline-info"><b>Envoyer</b></button>


                     </div>



                   </div>

                </form>

        </div>
    </div>
 </div>






            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!------ Include the above in your HEAD tag ---------->


@endsection


