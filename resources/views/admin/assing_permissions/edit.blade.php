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
      
        <form action="{{route('assing_permissions.update' , $role->id)}}" method="POST">
          @csrf  
          @method('PUT')
  
      <div class="row justify-content-center">
        
        <div class="col-md-8">
        <label>Select Role</label>
                      <select data-placeholder="Select a State" name="role_id" style="width: 100%;">
                        @foreach ($roles as $t_role)
                        <option value="{{$t_role->id}}"

                          @if ($role->id == $t_role->id)
        
                          selected
                              
                          @endif
                              
                          >{{$t_role->name}}</option>
        
                        @endforeach                       
                      </select>

        </div>

        <div class="col-md-8">
          <label>Select Permissions</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" name="permissions[]" style="width: 100%;">
                          @foreach ($permissions as $permission)
                          <option value="{{$permission->id}}"
                            @foreach ($role->permissions as $r_p)

                          @if ($permission->id == $r_p->id)
        
                          selected
                              
                          @endif
                              
                          @endforeach
                          >{{$permission->name}}</option>
          
                          @endforeach                       
                        </select>
  
                        <button type="submit" class="btn btn-success mt-3">Update</button>
          </div>


        

      
              

              




           
            

              
            
      </form>

  

     






    </section>
            
    
@endsection