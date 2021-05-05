@extends('admin.Master')


@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create A Post</h1>
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
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          

              <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input id="title" type="text" class="form-control" name="title" placeholder="Post title......">
                Characters Left : <span id="characters"></span>

              </div>
            </div>
            <div class="col-md-6">


              <div class="form-group">
                <label for="exampleInputPassword1">Subtitle</label>
                <input id="subtitle" type="text" class="form-control"name="subtitle"  placeholder=" Post subtitle.....">
                Characters Left : <span id="sub-characters"></span>

              </div>
            </div>
      </div>
            <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" class="form-control" name="slug"  placeholder="Post slug.....">
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
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
  
                  @endforeach                       
                </select>
              </div>
              <div class="col-md-6">

              <label>Select Categories</label>
              
              <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="categories[]">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>

                @endforeach
               
              </select>
            </div>
          </div>
          <div class="form-check" style="position: absolute; right:106px;top: 75px;" >
            <input type="checkbox" class="form-check-input" name="status" value="1">
            <label class="form-check-label" for="exampleCheck1">Active</label>
          </div>
          <button type="submit" class="publish"><i class="fas fa-paper-plane"></i>Publish</button>

              
              <div class="row">

            <div class="col-md-12 mt-3">
            <textarea id="ckeditor" name='body' style="height:200px;" >
            </textarea>
          </div>
              </div>

           

              
            
      </form>

      </div>
    </section>
            
    
@endsection

@section('script')
<script>
  function calc(value , element1, element2){

    var title = document.getElementById(element1);
var char = document.getElementById(element2);

title.onkeyup = function(){
    'use strict';
    char.textContent = value - this.value.length;
    


    char.textContent < 0 ? char.style.color = "#dc3545" : char.style.color = "#000"

    

}


  }

  calc(85 , 'title' , 'characters');
  calc(100 , 'subtitle' , 'sub-characters');

</script>
    
@endsection