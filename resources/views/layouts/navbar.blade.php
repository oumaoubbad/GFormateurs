<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #011745;">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="/img/excelencelogo.jpg" width="40" height="40" alt="Logo" class="me-2 rounded">
      <span class="fw-bold">Excelence</span>
    </a>

    <!-- Toggle button pour mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenu de la navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Menu gauche -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">HOME</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="offresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            OFFRES
          </a>
          <ul class="dropdown-menu" aria-labelledby="offresDropdown">
            <li><a class="dropdown-item" href="/recrutementFormation/show">Formation</a></li>
            <li><a class="dropdown-item" href="/recrutement/show">Emploi</a></li>
            <li><a class="dropdown-item" href="/recrutementStage/show">Stage</a></li>
          </ul>
        </li>
      </ul>

      <!-- Menu droit -->
      <ul class="navbar-nav align-items-center">
        <li class="nav-item me-3">
          <a class="nav-link" href="https://etac.ma/">À PROPOS DE NOUS</a>
        </li>

        @if (Route::has('login'))
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-primary px-4">
            Admin
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!-- Image sous la navbar -->
<img src="/img/hola.png" alt="Banner" width="900" height="170" class="rounded mx-auto d-block mt-3" style="max-width: 100%;">
