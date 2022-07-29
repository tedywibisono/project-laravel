<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active==="home") ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active==="about") ? 'active' : '' }}" href="{{ url('about') }}">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active==="posts") ? 'active' : '' }}" href="{{ url('posts') }}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active==="category") ? 'active' : '' }}" href="{{ url('categories') }}">Category</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
          {{-- auth adalah kondisi dimana sudah login --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             @if (auth()->user()->role == 1)
                 
              <li>
                <a class="dropdown-item" href="{{ url('dashboard') }}"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a>
              </li>
              <li><hr class="dropdown-divider">
              </li>
              <li>
             @endif

                <form action="logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
      
              </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ url('login') }}" class="nav-link {{ ($active==="login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right  "></i> Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>