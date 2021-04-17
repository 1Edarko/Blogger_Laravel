@extends('Master')

@include('user.layouts.navbar')




@section('bg-img' , asset('images/'.$post->image))

@section('p-title' , $post->title)

@section('p-sub' , $post->subtitle)


@include('user.layouts.header-content')



    

@section('content')
<!-- Post Content -->
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 ">
          <small style="font-weight: bold; ">Created at {{$post->created_at->diffForHumans()}}</small>
         
         <div class="mt-3">
          {!!htmlspecialchars_decode($post->body)!!}

         </div>
          
        
        </div>


        <div class="col-lg-4 col-md-4">
          <div class="tagss border p-3">

          <h2 class="p-2">Blog Topics</h2>
          @foreach ($post->tags as $tag)
          <ul class="list-group">
            <li class="list-group-item hover mb-1">

         <a class="hover1"style="margin-left: 20px;" href="{{route('post.tag',$tag->slug)}}"><i class="fas fa-tags nav-icon"></i><span class="tags">{{$tag->name}}</span></a>
            </li>
          @endforeach
            </ul>
          </div>
          <div class="categories mt-5 border p-2">
          <h2 class="p-2">Categories Cloud</h2>
          @foreach ($post->categories as $cat)
          <ul class="list-group">
            <li class="list-group-item hover mb-1">
         <a class="hover1" style="margin-left: 20px;" href="{{route('post.category',$cat->slug)}}"><i class="fas fa-list"></i><span class="cats">{{$cat->name}}</span></a>
            </li>
            
          @endforeach
        </ul>
    
        </div>
        
        <div class="latest mt-5 p-2 border">
          <h2 class="p-2">Latest Posts</h2>
          @foreach ($latest_posts as $single)
              
         <div class="side d-flex mb-3 mt-3 ">
        <div class="image-left">
          <img src="{{asset('ft_images/'.$single->ft_image)}}" alt="" height="80" width="80">
        </div>
        <div class="text-box-right">
          <a href="{{route('post' , $single->slug)}}"><h6 class="ml-3">{{$single->title}}</h6></a>
          <span class="ml-3 date text-black-50" style="font-size: 13px;">Created at {{$single->created_at->diffForHumans()}}</</span>
        </div>
      </div>
      <hr>
      @endforeach

    </div>
    
      </div>

      </div>
      <div class="row">
        <div class="col-md-8">

      
      <div class="p-icons float-right">
        <ul class="d-flex">
         <li><a class="a" onclick="document.getElementById('like-form-{{$post->id}}').submit();"><i class="far fa-heart"></i></a></li> 
          <li><span class="mr-1">{{$post->view_count}}</span><i class="far fa-eye"></i></li>
          <li><span class="mr-1">{{$post->comments->count()}}</span><i class="far fa-comment"></i></li>

        </ul>

      </div>
    </div>
      </div>
      <form action="{{route('like.post' , $post->id)}}" method="POST" class="d-none" id="like-form-{{$post->id}}"></form>

      
      <hr>


      <div class="d-flex justify-content-center row">
        @foreach ($post->comments as $comment)

        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2 border mt-3">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{asset('User/users_imgs/'.$comment->user->user_image)}}" width="60">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$comment->user->name}}</span><span class="date text-black-50">Shared publicly -
                          {{$comment->created_at->diffForHumans()}}:
                        </span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">
                            
                            {{$comment->body}}
                              
                          </p>
                    </div>
                </div>

  
    </div>
        </div>
        <hr>
        @endforeach
      </div>

      
      <h4 class="mt-3">leave A Reply</h4>

      <div class="col-md-8 mt-3">
    
           <form action="{{route('comments.store' , $post->id)}}" method="POST">
             @csrf
             <input type="hidden" name="post_id" value="{{$post->id}}">
             <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

          <div class="form-group">

            <textarea name="body" placeholder="Your Comment here......." class="form-control"></textarea>

          </div>

          <div class="form-group">
            <button class="btn btn-primary">Add Comment</button>
          </div>


        </form>
        </div>


  </article>

  


  <hr>

    
@endsection

@section('my-scripts')
<script>
  $('.a').click(function(event){

    event.preventDefault();

    


  });
</script>
    
@endsection
