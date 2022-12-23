@extends('layouts.no-navbar')

@section('content')
@include('partials.messages')
<div class="container mt-5 text-secondary">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-4 card p-4">
        <div class="row mb-5 fw-bold ">
          <div class="col">
            <a class="text-decoration-none text-secondary fs-5" href="/login">Masuk</a>  
          </div>
          <div class="col-3">
            <a class="text-decoration-none text-dark fs-5" href="/register">Daftar</a>
          </div>
        </div>
        
        <form method="POST">
            @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="input form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Vanessa Oey" name="nama" value="{{old('nama')}}" required>
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="input form-control @error('email') is-invalid @enderror" id="email" placeholder="vanessaoey@example.com" name="email" value="{{old('email')}}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="noHP" class="form-label">Nomor HP</label>
            <input type="tel" class="input form-control @error('noHP') is-invalid @enderror" id="noHP" placeholder="080123789456" name="noHP" value="{{old('noHP')}}" required>
            @error('noHP')
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
          <div class="mb-3">
            <label for="konfirmasiKataSandi" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" class="input form-control @error('konfirmasiKataSandi') is-invalid @enderror" id="konfirmasiKataSandi" placeholder="************" name="konfirmasiKataSandi" required>
            @error('konfirmasiKataSandi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn submit text-white" style="background: linear-gradient(to right, rgba(9, 48, 40, 1)
          , rgba(35, 122, 87, 1));">Daftar</button>
        </form>
        
        <span class="text-center mt-3" style="font-size: 18px">Butuh Bantuan ? Hubungi 
          <a href="" class="text-decoration-none" style="color:rgba(35, 122, 87, 1)">Maritory Care</a> 
        </span>
      </div>
    </div>
  </div>
@endsection