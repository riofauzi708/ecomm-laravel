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
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Why Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Testimonial</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
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

        <a href=""
          style="display: inline-flex; align-items: center; text-decoration: none; color: black; transition: background-color 0.3s, color 0.3s; padding: 5px 10px; border-radius: 5px; position: relative;">
          <i class="fa fa-cart-plus fa-lg"
            style="transition: transform 0.3s; color: black;"
            aria-hidden="true"
            onmouseover="this.style.transform='scale(1.2)'; this.style.color='black';"
            onmouseout="this.style.transform='scale(1)'; this.style.color='black';"></i>
          <span style="margin-left: 8px; font-size: 1.2rem; font-weight: bold; background: #dc3545; color: white; border-radius: 50%; padding: 2px 6px; position: absolute; top: -5px; right: -10px;">{{ $count }}</span>
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
  /* Hover Effects */
  .navbar-nav .nav-link {
    position: relative;
    transition: color 0.3s, background-color 0.3s;
    padding: 8px 16px;
    /* Padding for hover effect */
  }

  .navbar-nav .nav-link:hover {
    color: black;
    /* Change text color to black */
    background-color: white;
    /* Change background color to white */
    border-radius: 5px;
    /* Rounded corners */
  }

  .user_option a {
    transition: color 0.3s, transform 0.3s;
    /* Added transform for scaling */
  }

  .user_option a:hover {
    color: black;
    /* Keep icon color black on hover */
    transform: scale(1.1);
    /* Slightly increase size */
  }

  /* Hover effects for user icons */
  .user_option a i {
    transition: color 0.3s, transform 0.3s;
    /* Add transition for scaling */
  }

  .user_option a i:hover {
    color: #dc3545;
    /* Change color on hover */
    transform: scale(1.1);
    /* Slightly increase size */
  }

  /* Hover effects for cart icon */
  .fa-cart-plus:hover {
    color: #dc3545;
    /* Change color on hover */
    transform: scale(1.1);
    /* Slightly increase size */
  }

  /* Style for the logout button */
  .user_option form x-dropdown-link {
    transition: background-color 0.3s, color 0.3s, transform 0.3s, border 0.3s;
    /* Add transition */
    padding: 8px 16px;
    /* Consistent padding */
    display: inline-flex;
    /* Flex for alignment */
    align-items: center;
    /* Center icons and text */
    border: 2px solid transparent;
    /* Add a border for better visibility */
    border-radius: 5px;
    /* Rounded corners */
    color: black;
    /* Default text color */
  }

  /* Logout hover effects */
  .user_option form x-dropdown-link:hover {
    background-color: #dc3545;
    /* Change background color on hover */
    color: white;
    /* Change text color to white on hover */
    border: 2px solid white;
    /* Change border color to white on hover */
    transform: scale(1.05);
    /* Slightly increase size */
  }

  /* Style for login and register links */
  .user_option a {
    color: black;
    /* Default color */
    transition: color 0.3s;
    /* Smooth color transition */
  }

  .user_option a:hover {
    color: #dc3545;
    /* Change color on hover */
  }

  /* Style for the search button */
  .nav_search-btn:hover {
    background-color: white;
    /* Background color on hover */
    color: black;
    /* Icon color on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    /* Shadow effect */
    transform: scale(1.1);
    /* Slightly increase size */
  }
</style>