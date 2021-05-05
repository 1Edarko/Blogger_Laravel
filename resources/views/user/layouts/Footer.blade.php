
  <!-- Footer -->
  <footer>
    <div class="container footer">
      <div class="row">
        <div class="col-lg-4">
          <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
              <input class="form-control search" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append" style="margin-left: -29px;">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search" style="color: #fff"></i>
                </button>
              </div>
            </div>
          </form>

        </div>
        

        <div class="col-lg-4">
          <h4>Blog Menu</h4>
          <ul style="padding-left: 0">
            <li>
              <a class="nav-link footer-links" href="index.html"><i class="fas fa-chevron-right mr-2"></i>Home</a>
            </li>
            <li>
              <a class="nav-link footer-links" href="index.html"><i class="fas fa-chevron-right mr-2"></i>About Us</a>
            </li> <li>
              <a class="nav-link footer-links" href="index.html"><i class="fas fa-chevron-right mr-2"></i>Contact Us</a>
            </li>
            @guest
            <li>
              <a class="nav-link footer-links" href="index.html"><i class="fas fa-chevron-right mr-2"></i>Login</a>
            </li> <li>
              <a class="nav-link footer-links" href="index.html"><i class="fas fa-chevron-right mr-2"></i>Register</a>
            </li>
            @else
                
            @endguest
          </ul>
        </div>
        <div class="col-lg-4">
          <h4>About</h4>
          <p>Bridge. it's a blog with a special design by Mohamed Elhadi,contains great articles , easy to read them , fast reloading pages , Responsivity with all screen sizes.
          </p>
        </div>




        <div class="col-lg-8 col-md-10 mx-auto f-icons">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a  class="twitter" href="https://mobile.twitter.com/ElhadiM47942706">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a  class="linkedin" href="https://mobile.twitter.com/ElhadiM47942706">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a  class="facebook"href="https://www.facebook.com/mohamed.elhadi.39589/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="github" href="https://github.com/1Elhadi/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Bridge 2021</p>
        </div>
      </div>
    </div>
  </footer>
