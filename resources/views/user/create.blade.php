@extends('layouts.master')

@section('content')

    <!-- Page Heading -->
   
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-info">
               
                <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-6 my-3 text-center " style="color: #011745;">
                        <h3> <strong>Ajouter Utilisateurs</strong></h3>
                    </div>
                  
            </div>
            </div>
                    
                        
                   

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nom & Prenom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                    <div class="col-md-6">
                              <select name="role" class="form-control">
                              <option value="" selected disabled>role</option>
                                      <option value="1">Admin</option>
                                      <option value="0">User</option>
                                  </select>
                            </div>
</div>
<div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                                    <div class="col-md-6">
                              <select name="sex" class="form-control">
                              <option value="" selected disabled>sex</option>
                                      <option value="1">Femme</option>
                                      <option value="0">Homme</option>
                                  </select>
                            </div>
</div>
                            

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 text-md-end">{{ __('Confirmer Mot de Passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ajouter') }}
                                    </button>
                                    <a href="{{ route('user.index') }}" style=" background-color: #011745;" class="btn text-white">Annuler</a>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                   
                </div>
                
            </div>
        </div>
    </div>
@endsection
