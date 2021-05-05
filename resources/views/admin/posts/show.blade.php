@extends('admin.Master')


@section('content')
<div class="content-wrapper">
  @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    @if(Session::has('updated'))
    <div class="alert alert-success">
        {{Session::get('updated')}}
    </div>
    @endif

    @if(Session::has('deleted'))
    <div class="alert alert-danger">
        {{Session::get('deleted')}}
    </div>
    @endif
    <section class="content-header">

    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>All posts <span class="badge bg-primary">{{$posts->count()}}</span></h1>
      </div>
     
    </div>
    </section>
  <div class="row">
    <div class="col-md-12 text-right mt-3">
      @can('posts.create', Auth::user())
      <button class="create"><a href="{{route('posts.create')}}"><i class="fas fa-plus"></i>New Post</a></button>

      @endcan


    </div>
  </div>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Subtitle</th>
      <th scope="col">Comments</th>
      <th scope="col">Views</th>
      <th scope="col">Actions</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)

    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->slug}}</td>
      <td>{{$post->subtitle}}</td>
      <td class="text-center">{{$post->comments->count()}}</td>
      <td class="text-center">{{$post->view_count}}</td>


      <td>
        @can('posts.update', Auth::user())

        <a href="{{route('posts.edit',$post->id)}}"><i class="far fa-edit"></i></a>
        @endcan

        @can('posts.delete', Auth::user())

      <form  style='display: inline;'id ='delete' action="{{route('posts.destroy',$post->id)}}" method="POST">
          @csrf
          @method('DELETE')
          <a href='' onclick="event.preventDefault();document.getElementById('delete').submit();">
            <i class="far fa-trash-alt"></i>
          </a>
      </form>
      
      @endcan

      
      <a href="{{route('post',$post->slug)}}"><i class="far fa-eye"></i></a>

      </td>
        

    </tr>
        
    @endforeach
   
   
  </tbody>
</table>
</div>
    
@endsection