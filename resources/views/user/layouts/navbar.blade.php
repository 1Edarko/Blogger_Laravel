 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{route('blog.home')}}"><span class="logo">Bridge</span></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link  menu-links" href="{{route('blog.home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-links" href="about.html">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link menu-links" href="post.html">Contact Us</a>
          </li>
          <li class="nav-item">
  <!-- Authentication Links -->
  @guest
  @if (Route::has('login'))
      <li class="nav-item">
          <a class="nav-link menu-links" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
  @endif
  
  @if (Route::has('register'))
      <li class="nav-item">
          <a class="nav-link menu-links" href="{{ route('register') }}">{{ __('Register') }}</a>
      </li>
  @endif
@else
  <li class="nav-item dropdown" style="display: flex">
    <img class="img-profile rounded-circle" src="{{asset('User/users_imgs/'.Auth::user()->user_image)}}">

      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="    font-weight: bold;" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </div>
  </li>
@endguest          </li>
        </ul>
      </div>
    </div>
  </nav>