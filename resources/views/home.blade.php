@extends('layouts.main')
@section('title')

@endsection
@section('content')

<style>
  .text-a {
    color: #011745 !important; /* Bleu marine foncé */
  }
  footer {
    background-color: #011745;
    color: white;
    padding: 20px 0;
  }
  /* Wrapper pour le formulaire */
  .form-wrapper {
    max-width: 1000px;
    margin: 0 auto;
  }

  /* Bordure et shadow bleu marine sur la carte */
  .card {
    border: 2px solid #011745;
    box-shadow: 0 4px 15px rgba(1, 23, 69, 0.4);
  }

  /* Bordure bleu marine pour inputs (optionnel) */
  input.form-control,
  select.form-select,
  textarea.form-control {
    border-color: #011745;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }

  input.form-control:focus,
  select.form-select:focus,
  textarea.form-control:focus {
    border-color: #011745;
    box-shadow: 0 0 8px 0 rgba(1, 23, 69, 0.6);
    outline: none;
  }
</style>


<div class="form-wrapper">
  <form action="{{ route('formateurs.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="container p-0">
          <div class="text-center mb-4">
              <h3 class="text-primary fw-bold" style="border-bottom: 3px solid #011745; display: inline-block; padding-bottom: 2px;">
  Formulaire d'inscription
</h3>

          </div>

          <div class="card shadow-sm">
              <div class="card-body">

                  <div class="row mb-3 text-a">
                      <div class="col-md-4">
                          <label for="nom" class="form-label fw-semibold">Nom <span class="text-danger">*</span></label>
                          <input type="text" name="nom" id="nom" class="form-control" required>
                      </div>
                      <div class="col-md-4">
                          <label for="prenom" class="form-label fw-semibold">Prénom <span class="text-danger">*</span></label>
                          <input type="text" name="prenom" id="prenom" class="form-control" required>
                      </div>
                      <div class="col-md-4">
                          <label for="tel" class="form-label fw-semibold">Téléphone <span class="text-danger">*</span></label>
                          <input type="tel" name="tel" id="tel" class="form-control" required>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-8">
                          <label for="email" class="form-label fw-semibold text-a">Email <span class="text-danger">*</span></label>
                          <input type="email" name="email" id="email" class="form-control" required>
                      </div>
                      <div class="col-md-4">
                          <label for="cv" class="form-label fw-semibold text-a">CV <span class="text-danger">*</span></label>
                          <input type="file" name="cv" id="cv" class="form-control" required>
                      </div>
                  </div>

                  <div class="row mb-3 text-a">

  <div class="col-md-4">
    <label for="demaine" class="form-label fw-semibold">
      Domaines d'expertise <span class="text-danger">*</span>
    </label>
    <input
      list="demaine-options"
      id="demaine"
      name="demaine"
      class="form-control"
      placeholder="Choisir ou écrire..."
      required
    />
    <datalist id="demaine-options">
      <option value="Développement Web"></option>
      <option value="Data Science"></option>
      <option value="Cybersécurité"></option>
      <option value="Design UI/UX"></option>
      <option value="Gestion de projet"></option>
    </datalist>
  </div>

  <div class="col-md-4">
    <label for="spec" class="form-label fw-semibold">
      Spécialités <span class="text-danger">*</span>
    </label>
    <input
      list="spec-options"
      id="spec"
      name="spec"
      class="form-control"
      placeholder="Choisir ou écrire..."
      required
    />
    <datalist id="spec-options">
      <option value="Frontend (React, Vue)"></option>
      <option value="Backend (Laravel, Node.js)"></option>
      <option value="Machine Learning"></option>
      <option value="Tests d’intrusion"></option>
      <option value="Design Graphique"></option>
    </datalist>
  </div>

  <div class="col-md-4">
    <label for="dispo" class="form-label fw-semibold">
      Disponibilité géographique <span class="text-danger">*</span>
    </label>
    <input
      list="dispo-options"
      id="dispo"
      name="dispo"
      class="form-control"
      placeholder="Choisir ou écrire..."
      required
    />
   <datalist id="dispo-options">
  <option value="Agadir"></option>
  <option value="Casablanca"></option>
  <option value="Fès"></option>
  <option value="Marrakech"></option>
  <option value="Rabat"></option>
  <option value="Tanger"></option>
  <option value="Meknès"></option>
  <option value="Oujda"></option>
  <option value="Kenitra"></option>
  <option value="Tétouan"></option>
  <option value="Safi"></option>
  <option value="El Jadida"></option>
  <option value="Khouribga"></option>
  <option value="Béni Mellal"></option>
  <option value="Nador"></option>
  <option value="Settat"></option>
  <option value="Kénitra"></option>
  <option value="Larache"></option>
  <option value="Taza"></option>
  <option value="Essaouira"></option>
  <option value="Al Hoceima"></option>
  <option value="Ouazzane"></option>
  <option value="Guelmim"></option>
  <option value="Boujdour"></option>
  <option value="Dakhla"></option>
  <option value="Tan-Tan"></option>
  <option value="Ouarzazate"></option>
  <option value="Sidi Kacem"></option>
  <option value="Sidi Slimane"></option>
  <option value="Khemisset"></option>
  <option value="Youssoufia"></option>
  <option value="Taroudant"></option>
  <option value="Tiznit"></option>
  <option value="Midelt"></option>
  <option value="Errachidia"></option>
  <option value="Sidi Ifni"></option>
  <option value="Tantan"></option>
</datalist>

  </div>

</div>


                  <fieldset class="mb-4">
                      <legend class="col-form-label fw-semibold text-a mb-2">Années d'expérience <span class="text-danger">*</span></legend>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exp" id="exp1" value="Moins de 5 ans" required>
                                  <label class="form-check-label" for="exp1">Moins de 5 ans</label>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exp" id="exp2" value="Entre 5 et 10 ans">
                                  <label class="form-check-label" for="exp2">Entre 5 et 10 ans</label>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="exp" id="exp3" value="Plus de 10 ans">
                                  <label class="form-check-label" for="exp3">Plus de 10 ans</label>
                              </div>
                          </div>
                      </div>
                  </fieldset>

                  <div class="row mb-3 text-a">
                      <div class="col-md-4">
                          <label for="photo" class="form-label fw-semibold">Photo</label>
                          <input type="file" name="photo" id="photo" class="form-control">
                      </div>
                      <div class="col-md-8">
                          <label class="form-label fw-semibold">CIN</label>
                          <div class="row">
                              <div class="col-md-6">
                                  <input type="file" name="recto" class="form-control" aria-describedby="rectoHelp" placeholder="Recto">
                              </div>
                              <div class="col-md-6">
                                  <input type="file" name="verso" class="form-control" aria-describedby="versoHelp" placeholder="Verso">
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="row mb-3 text-a">
                      <div class="col-md-6">
                          <label for="attes" class="form-label fw-semibold">Attestation de référence</label>
                          <input type="file" name="attes" id="attes" class="form-control">
                      </div>
                      <div class="col-md-6">
                          <label for="diplome" class="form-label fw-semibold">Copie des diplômes</label>
                          <input type="file" name="diplome" id="diplome" class="form-control">
                      </div>
                  </div>

                  <div class="d-flex justify-content-end gap-2">
                      <button type="reset" class="btn btn-secondary">Annuler</button>
                      <button type="submit" class="btn btn-primary">Valider</button>
                  </div>

              </div>
          </div>
      </div>
  </form>
</div>

<footer class="mt-5">
  <div class="container text-center">
    <p class="mb-0">© 2025 MonSite. Tous droits réservés.</p>
  </div>
</footer>

@endsection
