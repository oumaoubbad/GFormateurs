@extends("layouts.master")

@section('content')

<style>
  /* Variables couleurs */
  :root {
    --main-color: #011745;
    --secondary-color: #6c757d;
    --btn-info-bg: #017BFF;
    --btn-info-hover: #0056b3;
    --input-border-color: #ced4da;
    --input-focus-border-color: var(--main-color);
  }

  /* Profil - Image */
  .profile-user-img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border: 3px solid var(--main-color);
    padding: 3px;
  }

  /* Nom utilisateur */
  .profile-username {
    font-weight: 700;
    color: var(--main-color);
    margin-top: 1rem;
    margin-bottom: 0.3rem;
  }

  /* Role */
  .text-muted {
    font-style: italic;
  }

  /* Bouton changer photo */
  #change_picture_btn {
    background-color: var(--main-color);
    border: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }
  #change_picture_btn:hover {
    background-color: var(--btn-info-hover);
    color: #fff;
  }

  /* Card header nav */
  .card-header .nav-pills .nav-link {
    color: white;
    font-weight: 600;
    text-transform: uppercase;
  }
  .card-header .nav-pills .nav-link.active {
    background-color: var(--main-color);
  }

  /* Form controls */
  .form-control {
    border: 1px solid var(--input-border-color);
    border-radius: 0.3rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }
  .form-control:focus {
    border-color: var(--input-focus-border-color);
    box-shadow: 0 0 5px rgba(1, 23, 69, 0.4);
  }

  /* Labels */
  label {
    font-weight: 600;
    color: var(--main-color);
  }

  /* Boutons */
  button.btn-info {
    background-color: var(--main-color);
    border: none;
    font-weight: 600;
    padding: 0.5rem 1.25rem;
    border-radius: 0.3rem;
    transition: background-color 0.3s ease;
  }
  button.btn-info:hover {
    background-color: var(--btn-info-hover);
  }

  /* Gestion des messages d'erreur */
  .error-text {
    font-size: 0.875rem;
    color: #d6336c;
    margin-top: 0.25rem;
    display: block;
  }
</style>

<!-- Content Header -->


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- Profile Image -->
      <div class="col-md-3">
        <div class="card card-info card-outline shadow-sm">
          <div class="card-body box-profile text-center">
            <img src="/images/2.png{{ Auth::user()->picture }}" alt="User profile picture" class="profile-user-img img-fluid img-circle admin_picture">
            <h3 class="profile-username">{{ Auth::user()->name }}</h3>
            <p class="text-muted">Admin</p>

            <input type="file" name="admin_image" id="admin_image" style="display:none;">
            <a href="javascript:void(0)" class="btn btn-info btn-block" id="change_picture_btn">Changer la photo</a>
          </div>
        </div>
      </div>

      <!-- Profile Details -->
      <div class="col-md-9">
        <div class="card shadow-sm">
          <div class="card-header p-2 bg-secondary">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link active text-white" href="#personal_info" data-toggle="tab">Informations personnelles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#change_password" data-toggle="tab">Changer le mot de passe</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">

              <!-- Personal Info Tab -->
              <div class="active tab-pane" id="personal_info">
                <form method="POST" action="{{ route('adminUpdateInfo') }}" id="AdminInfoForm" class="form-horizontal">
                  @csrf
                  <div class="form-group row mb-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="name" placeholder="Nom" value="{{ Auth::user()->name }}">
                      <span class="error-text name_error"></span>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                      <span class="error-text email_error"></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Enregistrer les modifications</button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Change Password Tab -->
              <div class="tab-pane" id="change_password">
                <form method="POST" action="{{ route('adminChangePassword') }}" id="changePasswordAdminForm" class="form-horizontal">
                  @csrf
                  <div class="form-group row mb-3">
                    <label for="oldpassword" class="col-sm-2 col-form-label">Ancien mot de passe</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Entrez l'ancien mot de passe">
                      <span class="error-text oldpassword_error"></span>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="newpassword" class="col-sm-2 col-form-label">Nouveau mot de passe</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Entrez le nouveau mot de passe">
                      <span class="error-text newpassword_error"></span>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="cnewpassword" class="col-sm-2 col-form-label">Confirmer nouveau mot de passe</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="cnewpassword" name="cnewpassword" placeholder="Confirmez le nouveau mot de passe">
                      <span class="error-text cnewpassword_error"></span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Mettre à jour le mot de passe</button>
                    </div>
                  </div>
                </form>
              </div>

            </div><!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col-md-9 -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection
