@extends('admin.Master')


@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="row">

        <div class="col-md-6">
        <form action="{{route('posts.update' , $post->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Post title......">
              </div>
            </div>
            <div class="col-md-6">


              <div class="form-group">
                <label for="exampleInputPassword1">Subtitle</label>
                <input type="text" class="form-control"name="subtitle" value="{{$post->subtitle}}" placeholder=" Post subtitle.....">
              </div>
            </div>
      </div>
            <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$post->slug}}" placeholder="Post slug.....">
              </div>
            </div>
            <div class="col-md-4">

              <div class="form-group">
                <label for="exampleInputFile">Post Banner Picture</label>
                <div class="input-group">

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>


                </div>
                        
                         

              </div>
            </div>
            <div class="col-md-4">

              <div class="form-group">
                <label for="exampleInputFile">Feautured Post Picture</label>
                <div class="input-group">

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="ft_image">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>

                

                </div>
                        
                         

              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label>Select Tags</label>
                <select class="select2" multiple="multiple" data-placeholder="Select a State" name="tags[]" style="width: 100%;">
                  @foreach ($tags as $tag)
                  <option value="{{$tag->id}}"
                    @foreach ($post->tags as $p_tag)
                    @if ($p_tag->id == $tag->id)
                    selected
                        
                    @endif
                        
                    @endforeach
                    
                    
                    >{{$tag->name}}</option>
  
                  @endforeach                       
                </select>
              </div>
              <div class="col-md-6">

              <label>Select Categories</label>
              
              <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="categories[]">
                @foreach ($categories as $category)
                <option value="{{$category->id}}"
                  @foreach ($post->categories as $p_cat)
                  @if ($p_cat->id == $category->id)
                  selected
                      
                  @endif
                      
                  @endforeach
                  >{{$category->name}}</option>

                @endforeach
               
              </select>
            </div>
          </div>
          <div class="form-check" style="position: absolute; right:106px;top: 75px;" >
            <input type="checkbox" class="form-check-input" name="status" value="1"
            @if ($post->status == 1)
            checked
                
            @endif>
            <label class="form-check-label" for="exampleCheck1">Active</label>
          </div>
          <button type="submit" class="publish"><i class="fas fa-paper-plane"></i>Publish</button>

              
              <div class="row">

            <div class="col-md-12 mt-3">
            <textarea id="ckeditor" name='body' style="height:200px;" >
              {{$post->body}}
            </textarea>
          </div>
              </div>

           

              
            
      </form>

      </div>
    </section>
            
    
@endsection