@extends('admin.Master')


@section('content')
 @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create A Category</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
          <div class="col-md-4">

        <form action="{{route('categories.store')}}" method="POST">
          @csrf
          

              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" name="name" placeholder="Category Name......">
                @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" class="form-control"name="slug"  placeholder=" Slug.....">
                @error('slug')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>


           
            <!-- /.card-body -->
            <button type="submit" class="btn btn-success">Create</button>

              
            
      </form>

    </div>

     






      </div>
    </section>
            
    
@endsection