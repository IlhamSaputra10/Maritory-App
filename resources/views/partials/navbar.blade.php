<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="img/jaket.jpg" alt="Logo" width="40" height="40" class="me-2">
      Maritory
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <form class="d-flex ms-auto my-4 my-lg-0" role="search">
        <input class="form-control me-2 form-search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light" type="submit"><i class="uil uil-search"></i></button>
      </form>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ ($title == 'Home') ? 'active' : '' }} " href="/">Home</a>
        </li>

        <hr>

        <li class="nav-item">
          <a class="nav-link {{ ($title == 'Yea') ? 'active' : '' }}" href="/yea">Yea</a>
        </li>

        <hr>
      </ul>
      
      @auth
      <div class="dropdown">
        <button class="btn nav-link btn-link dropdown-toggle btn-user" type="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img src="{{ auth()->user()->avatar }}" alt=""
        class="rounded-circle border border-primary border-3 avatar" width="40" height="40"
        style="object-fit: cover; background-color: white;">
      </button>
      <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
          <li><span class="dropdown-item-text">Signed in as <br><b style="font-size: 17px;">{{ auth()->user()->nama }}</b></span></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="">My Profile</a></li>
          <li><a class="dropdown-item" href="">My Market</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="/logout">Log Out</a></li>
        </ul>
      </div>

      @else
      <a class="nav-link" href="/login"><button type="button" class="btn btn-outline-light btn-user">Sign
          In</button></a>
      <a class="nav-link" href="/register"><button type="button" class="btn btn-light btn-user">Sign Up</button></a>
      @endauth

    </div>

  </div>
</nav>