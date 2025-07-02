@extends('layouts.main')

@section('content')
<style>
  body {
    background: #fff;
  }
  .login-card {

    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    padding: 2.5rem 2rem;
  }
  .login-card h2 {
    font-weight: 1000px;
    color: #011745;
  }
  .form-label {
    font-weight: 600;
    color: #011745;
  }
  .input-group-text {
    background: #011745;
    color: white;
    border: none;
    border-radius: 0.375rem 0 0 0.375rem;
  }
  .form-control {
    border-radius: 0 0.375rem 0.375rem 0;
    border: 1px solid #ced4da;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }
  .form-control:focus {
    border-color: #011745;
    box-shadow: 0 0 6px #011745aa;
  }
  .btn-primary {
    background-color: #011745;
    border: none;
    font-weight: 700;
    padding: 0.75rem;
    width: 100%;
    border-radius: 0.5rem;
    transition: background-color 0.3s ease;
  }
  .btn-primary:hover,
  .btn-primary:focus {
    background-color: #004080;
  }
  .text-primary {
    color: #011745 !important;
  }
  a.text-primary:hover {
    text-decoration: underline;
  }
  small.text-danger {
    font-size: 0.85rem;
  }
</style>

<div class=" mt-1 container d-flex justify-content-center align-items-center">
  <div class="login-card">
    <h2 class="text-center mb-4">Login</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      {{-- Email --}}
      <div class="form-group mb-4">
        <label for="email" class="form-label">Email Address</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
            autocomplete="email"
            class="form-control @error('email') is-invalid @enderror"
          />
        </div>
        @error('email')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      {{-- Password --}}
      <div class="form-group mb-4">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fa fa-lock"></i></span>
          <input
            type="password"
            id="password"
            name="password"
            required
            autocomplete="current-password"
            class="form-control @error('password') is-invalid @enderror"
          />
        </div>
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      {{-- Remember --}}
      <div class="form-check mb-4">
        <input
          class="form-check-input"
          type="checkbox"
          name="remember"
          id="remember"
          {{ old('remember') ? 'checked' : '' }}
        />
        <label class="form-check-label" for="remember">Remember Me</label>
      </div>

      {{-- Submit --}}
      <button type="submit" class="btn btn-primary mb-3">Login</button>

      {{-- Forgot password --}}
      @if (Route::has('password.request'))
        <div class="text-center">
          <a href="{{ route('password.request') }}" class="text-primary">Forgot Your Password?</a>
        </div>
      @endif
    </form>
  </div>
</div>
@endsection
