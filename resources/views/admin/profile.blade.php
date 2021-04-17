@extends('admin.Master')


  @section('content')
  <div class="content-wrapper">
    @if(Session::has('update'))
    <div class="alert alert-success">
        {{Session::get('update')}}
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> User Profile</h1>
          </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('admin/users_imgs/'. Auth::user()->user_image)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                <hr>

                <p class="text-muted text-center">@foreach (Auth::user()->roles as $role)
                {{$role->name}}
                @endforeach</p>

                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Settings" data-toggle="tab"><i class="fas fa-info-circle mr-1"></i>Profile Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Password" data-toggle="tab"><i class="fas fa-lock mr-1"></i>Password</a></li>

                </ul>
              </div><!-- /.card-header -->
              <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="tab-content">

               

                
                  

                  <div class="tab-pane active" id="Settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="name" name="name" class="form-control" value="{{Auth::user()->name}}" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="{{Auth::user()->email}} "id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="inputName2" value="{{Auth::user()->phone}}" placeholder="Phone Number">
                        </div>
                      </div>
                     
                          <input type="hidden" class="form-control" name="user_id" id="inputName2" value="{{Auth::user()->id}}">

                     
                      <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">File Input</label>
                        <div class="col-sm-10">
                          <input type="file" class="custom-file-input" name="user_image">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>                        </div>
                      </div>
                
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  {{-- paswword --}}
                  <div class="tab-pane" id="Password">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="paswword" class="col-sm-2 col-form-label">Old Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="old_password" id="inputName2" placeholder="Your Old Password">

                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="paswword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" id="inputName2" placeholder="Your Password">

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">P.Confirmation</label>
                        <div class="col-sm-10">

                        <input type="password" class="form-control"name="password_confirmation"  placeholder=" Confirm Your password">
                        </div>
                      </div>
                    
                
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      
  @endsection


