@extends('Master')
@section('bg-img' , asset('User/img/blog-bg.jpg'))
@section('p-title' , 'Welcome To The Bridge')
@section('p-sub' , 'Every Day Blogs , Every Day Reading')


@include('user.layouts.navbar')

    



@include('user.layouts.header-content')







@section('content')
<!-- Main Content -->
<div class="container">

<h2 class="pull-left mb-3">Blog Posts</h2>
<hr>
<br>
<div class="row">
<div class="col-lg-8 col-12">
  @foreach ($posts as $p)

  <div class="card mb-3" style="max-width: 95%; position: relative;">
    <div class="row g-0">
      <div class="col-lg-4 col-sm-4 resize">
        <a href="{{route('post', $p->slug)}}"><embed 
          src="{{asset('ft_images/'.$p->ft_image)}}" width="200" height="221"
          alt="{{$p->title}}"
        /></a>
        
      </div>
      <div class="col-lg-8 col-sm-8">
        <div class="card-body">
          <div class="icons">
            <ul class="d-flex">
              <li><i class="far fa-heart"></i></li>
              <li><i class="far fa-eye"></i><span class="ml-1">{{$p->view_count}}</span></li>
              <li><i class="far fa-comment"></i><span class="ml-1">{{$p->comments->count()}}</span</li>

            </ul>

          </div>
          <h5 class="card-title">{{$p->title}}</h5>
          <p  class="card-text">{{$p->subtitle}}</p>
          <p class="card-text"><small class="text-muted">{{date("M  m,Y" ,strtotime($p->created_at) )}}</small></p>
          <a href="{{route('post', $p->slug)}}" class="btn btn-primary read"><span>Read More...</span></a>

        </div>
      </div>
    </div>
  </div>
  @endforeach

  <!-- Pager -->
  <div class="col-lg-8 mx-auto">
    <div class="text-center">

      {{$posts->links("pagination::bootstrap-4")}}
    </div>

  </div>

</div>
<div class="col-lg-4">
  <div class="latest mt-5 p-2 border">
    <h2 class="p-2">Popular Posts</h2>
    @foreach ($Popular_Posts as $p_post)
        
   <div class="side d-flex mb-3 mt-3 ">
  <div class="image-left">
    <img src="{{asset('ft_images/'.$p_post->ft_image)}}" alt="" height="80" width="80">
  </div>
  <div class="text-box-right">
    <a href="{{route('post' , $p_post->slug)}}"><h6 class="ml-3">{{$p_post->title}}</h6></a>
    <span class="ml-3 date text-black-50" style="font-size: 13px;">Created at {{$p_post->created_at->diffForHumans()}}</</span>
  </div>
</div>
<hr>
@endforeach

</div>
<div class="tagss border p-3 mt-3">

  <h2 class="p-2">Labels</h2>
  @foreach ($labels as $tag)
  <ul class="list-group">
    <li class="list-group-item hover mb-1">

 <a class="hover1"style="margin-left: 20px;" href="{{route('post.tag',$tag->slug)}}"><i class="fas fa-tags nav-icon"></i><span class="tags">{{$tag->name}}</span></a>
    </li>
  @endforeach
    </ul>
  </div>

</div>
</div>
</div>


    
      
        
        
     


    
@endsection
@section('Footer')

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
    
@endsection

