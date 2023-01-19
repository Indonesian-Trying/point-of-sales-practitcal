@extends('app')
@section('content')
@auth
<p>Welcome <b>{{ Auth::user()->name }}</b></p>
<a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
@endauth
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Wikramart</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <li class="nav-item active">
            <a class="nav-link" href="penggunas">Pengguna <span class="login"></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="distributors">Distributor <span class="login"></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="mereks">Merek</a>
          </li>
        <li class="nav-item active">
          <a class="nav-link" href="barangs">Barang</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="transaksis">Transaksi</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="login">Login <span class="login"></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="register">Register</a>
        </li>
      </ul>
    </div>
  </nav>
@guest
<a class="btn btn-primary" href="{{ route('login') }}">Login</a>
<a class="btn btn-info" href="{{ route('register') }}">Register</a>
@endguest
@endsection