@extends('layouts.no-navbar')

@section('content')
@include('partials.messages')
<div class="container mt-5 text-secondary">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4 card p-4">
        <div class="row mb-5 fw-bold ">
          <div class="col">
            <a class="text-decoration-none text-dark fs-5" href="/login">Masuk</a>  
          </div>
          <div class="col-3">
            <a class="text-decoration-none text-secondary fs-5" href="/register">Daftar</a>
          </div>
        </div>

        <form method="POST">
            @csrf
          <div class="mb-3">
            <label for="hpEmail" class="form-label">Nomor HP atau Email</label>
            <input type="text" class="input form-control @error('hpEmail') is-invalid @enderror" id="hpEmail" placeholder="vanessa.oey@gmail.com" name="hpEmail" value="{{old('hpEmail')}}" required>
            @error('hpEmail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="kataSandi" class="form-label">Kata Sandi</label>
            <input type="password" class="input form-control @error('kataSandi') is-invalid @enderror" id="kataSandi" placeholder="************" name="kataSandi" required>
            @error('kataSandi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mb-3">
            <div class="col">
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                <label class="form-check-label" for="exampleCheck1" style="font-size: 14px">Ingat Saya</label>
              </div>
            </div>
            <div class="col-5">
              <div class="mb-3">
                <a href="" class="text-decoration-none text-secondary" style="font-size: 14px">
                    Lupa Kata Sandi?
                </a>
              </div>
            </div>
          </div>
          <button type="submit" class="btn submit text-white" style="background: linear-gradient(to right, rgba(9, 48, 40, 1)
          , rgba(35, 122, 87, 1));">Masuk</button>
        </form>
        <span class="text-center mt-5" style="border-bottom:1px solid grey; font-size: 14px">atau masuk dengan</span>

        <a href="{{ route('login.google') }}" class="btn mt-4 social" style="border: 1px solid black">
          <i class="fab fa-google"></i> 
          <span>Google</span>              
        </a>

        <a href="{{ route('login.facebook') }}" class="btn mt-4 social" style="border: 1px solid black">
          <i class="bi bi-facebook"></i> 
          <span>Facebook</span>
        </a>
        
        <span class="text-center mt-3" style="font-size: 18px">Butuh Bantuan ? Hubungi 
          <a href="" class="text-decoration-none" style="color:rgba(35, 122, 87, 1)">Maritory Care</a> 
        </span>
      </div>
    </div>
  </div>
@endsection