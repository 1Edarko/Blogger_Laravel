@extends('admin.Master')


@section('content')
 @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Permission</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
          <div class="col-md-4">

        <form action="{{route('permissions.update',$permission->id)}}" method="POST">
          @csrf

          @method('PUT')

          

              <div class="form-group">
                <label for="permission">Permission Name</label>
                <input type="text" class="form-control" value="{{$permission->name}}" name="name" placeholder="Permission Name......">
              </div>

             


           
            <!-- /.card-body -->
            <button type="submit" class="btn btn-success">Update</button>

              
            
      </form>

    </div>

     






      </div>
    </section>
            
    
@endsection