@extends('admin.Master')


@section('content')
 @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create A New User</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
        
          <div class="col-md-4">

        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="name" placeholder="User Name......">
                @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>
            </div>


              <div class="col-md-4">

              <div class="form-group">
                <label for="email">Email Adress</label>
                <input type="text" class="form-control"name="email"  placeholder=" Email.....">
                @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
              </div>

              </div>

      </div>   
      <div class="row justify-content-center">

        <div class="col-md-3">

          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control"name="phone"  placeholder=" Your Phone +0">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror
          </div>

          </div>

          <div class="col-md-3">

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control"name="password"  placeholder=" Your password.....">
              @error('password')
              <span class="text-danger">{{$message}}</span>
          @enderror
            </div>
  
            </div>
            <div class="row">

            <div class="col-md-12">

              <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control"name="password_confirmation"  placeholder=" Confirm Your password.....">
                
              </div>
    
              </div>
            </div>

            
        
      </div>  
    

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="form-group">
            <label for="exampleInputFile">Profile Picture</label>
            <div class="input-group">

              <div class="custom-file">
                <input type="file" class="custom-file-input" name="user_image">
                @error('user_image')
                <span class="text-danger">{{$message}}</span>
            @enderror
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
        </div>
        </div>
      
        
      </div>
     
        <div class="row justify-content-center">

        <div class="col-md-8">
        <label>Select Roles</label>
                      <select class="select2" multiple="multiple" data-placeholder="Select a State" name="roles[]" style="width: 100%;">
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
        
                        @endforeach                       
                      </select>

                      <button type="submit" class="btn btn-success mt-3">Create</button>
        </div>


        
      </div>

      
              

              




           
            

              
            
      </form>

  

     






    </section>
            
    
@endsection