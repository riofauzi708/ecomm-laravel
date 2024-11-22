<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span>Giftos</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/shop') }}">Shop</a>
        </li>
        <li class="nav-item {{ Request::is('why') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/why') }}">Why Us</a>
        </li>
        <li class="nav-item {{ Request::is('testi') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/testi') }}">Testimonial</a>
        </li>
        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
        </li>
      </ul>
      <div class="user_option">
        @if (Route::has('login'))
        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            {{ __('Logout') }}
          </x-dropdown-link>
        </form>
        @else
        <a href="{{ route('login') }}">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>Login</span>
        </a>
        <a href="{{ route('register') }}">
          <i class="fa fa-vcard" aria-hidden="true"></i>
          <span>Register</span>
        </a>
        @endauth
        @endif

        <a href="{{ url('my_cart') }}"
          style="display: inline-flex; align-items: center; text-decoration: none; color: black; transition: background-color 0.3s, color 0.3s; padding: 5px 10px; border-radius: 5px; position: relative;">
          <i class="fa fa-cart-plus fa-2x"
            style="transition: transform 0.3s; color: black;"
            aria-hidden="true"
            onmouseover="this.style.transform='scale(1.2)'; this.style.color='black';"
            onmouseout="this.style.transform='scale(1)'; this.style.color='black';"></i>

          @auth
          <span style="font-size: 1rem; font-weight: bold; background: #dc3545; color: white; border-radius: 100%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; position: absolute; top: -4px; right: -1px;">
            {{ $count }}
          </span>
          @endauth
        </a>

        <form class="form-inline">
          <button class="btn nav_search-btn" type="submit"
            style="transition: background-color 0.3s, box-shadow 0.3s;">
            <i class="fa fa-search fa-lg" aria-hidden="true"></i>
          </button>
        </form>
      </div>
    </div>
  </nav>
</header>


<style>
  /* Navbar hover effects */
  .navbar-nav .nav-link {
    position: relative;
    padding: 8px 16px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
    /* Smooth transitions */
  }

  .navbar-nav .nav-link:hover {
    color: black;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Add subtle shadow */
  }

  /* User icons hover effects */
  .user_option a {
    transition: all 0.3s ease-in-out;
    /* Include all for smooth transitions */
  }

  .user_option a:hover {
    color: #dc3545;
    transform: scale(1.1);
  }

  /* Icon-specific hover effects */
  .user_option a i {
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
  }

  .user_option a i:hover {
    color: #dc3545;
    transform: scale(1.15);
    /* Slightly larger scale */
  }

  /* Cart icon hover effect */
  .fa-cart-plus:hover {
    color: #dc3545;
    transform: scale(1.15);
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
  }

  /* Logout button styling */
  .user_option form x-dropdown-link {
    display: inline-flex;
    align-items: center;
    padding: 8px 16px;
    border: 2px solid transparent;
    border-radius: 5px;
    color: black;
    transition: all 0.3s ease-in-out;
  }

  .user_option form x-dropdown-link:hover {
    background-color: #dc3545;
    color: white;
    border-color: white;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  /* Login and register links */
  .user_option a {
    color: black;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
  }

  .user_option a:hover {
    color: #dc3545;
    text-decoration: underline;
  }

  /* Search button hover effect */
  .nav_search-btn {
    transition: all 0.3s ease-in-out;
  }

  .nav_search-btn:hover {
    background-color: white;
    color: black;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transform: scale(1.1);
  }

  /* Media Queries for Responsiveness */
  @media (max-width: 768px) {
    .navbar-nav .nav-link {
      padding: 6px 12px;
      font-size: 14px;
    }

    .user_option a,
    .user_option form x-dropdown-link {
      font-size: 14px;
      padding: 6px 12px;
    }

    .nav_search-btn {
      padding: 8px;
    }
  }
</style>