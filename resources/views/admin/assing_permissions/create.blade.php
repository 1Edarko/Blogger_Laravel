@extends('admin.Master')


@section('content')
 @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create A New Assignement</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-center">
      
        <form action="{{route('assing_permissions.store')}}" method="POST">
          @csrf  
  
      <div class="row justify-content-center">
        
        <div class="col-md-8">
        <label>Select Role</label>
                      <select data-placeholder="Select a State" name="role_id" style="width: 100%;">
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
        
                        @endforeach                       
                      </select>

        </div>

        <div class="col-md-8">
          <label>Select Permissions</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" name="permissions[]" style="width: 100%;">
                          @foreach ($permissions as $permission)
                          <option value="{{$permission->id}}">{{$permission->name}}</option>
          
                          @endforeach                       
                        </select>
  
                        <button type="submit" class="btn btn-success mt-3">Create</button>
          </div>


        

      
              

              




           
            

              
            
      </form>

  

     






    </section>
            
    
@endsection