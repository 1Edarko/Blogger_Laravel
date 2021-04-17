@extends('Master')
@section('bg-img' , asset('User/img/home-bg.jpg'))
@section('p-title' , 'Welcome To blogger')


@include('user.layouts.navbar')

    



@include('user.layouts.header-content')







@section('content')
<!-- Main Content -->
<div class="container">

<h2 class="pull-left mb-3">Blog Posts</h2>
<hr>
<br>
<div class="row">
<div class="col-md-8">
  @foreach ($posts as $p)

  <div class="card mb-3" style="max-width: 90%; position: relative;height: 211px">
    <div class="row g-0">
      <div class="col-md-4">
        <a href="{{route('post', $p->slug)}}"><embed
          src="{{asset('ft_images/'.$p->ft_image)}}" width="200" height="209"
          alt="{{$p->title}}"
        /></a>
        
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <div class="icons">
            <ul class="d-flex">
              <li><i class="far fa-heart"></i></li>
              <li><i class="far fa-eye"></i><span class="ml-1">{{$p->view_count}}</span></li>
              <li><i class="far fa-comment"></i><span class="ml-1">{{$p->comments->count()}}</span</li>

            </ul>

          </div>
          <h5 class="card-title">{{$p->title}}</h5>
          <p class="card-text">{{$p->subtitle}}</p>
          <p class="card-text"><small class="text-muted">{{date("M  m,Y" ,strtotime($p->created_at) )}}</small></p>
          <a style="position: absolute;right: 14px; top: 156px;" href="{{route('post', $p->slug)}}" class="btn btn-primary"><span>Read More...</span></a>

        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
<div class="col-md-4">
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


    
      
        <!-- Pager -->
        {{-- <div class="col-lg-8 col-md-10 mx-auto">

            {{$posts->links("pagination::bootstrap-4")}}

        </div> --}}
        
     


    
@endsection

