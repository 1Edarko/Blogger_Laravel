@extends('admin.Master')


@section('content')
<div class="content-wrapper">
     {{-- succes message --}}
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
         {{-- succes message --}}

     {{-- update message --}}

    @if(Session::has('updated'))
    <div class="alert alert-success">
        {{Session::get('updated')}}
    </div>
    @endif

         {{--  end update message --}}

     {{-- deleted message --}}

    @if(Session::has('deleted'))
    <div class="alert alert-danger">
        {{Session::get('deleted')}}
    </div>
    @endif

         {{-- end deleted message --}}
         <section class="content-header">

         <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Permissions <span class="badge bg-primary">{{$permissions->count()}}</span></h1>
          </div>
         
        </div>
         </section>

  <div class="row">
    <div class="col-md-12 text-right mt-3">
      <button class="create"><a href="{{route('permissions.create')}}"><i class="fas fa-plus"></i>New Permission</a></button>


    </div>
  </div>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Permission Name</th>
      <th scope="col">Actions</th>

     

    </tr>
  </thead>
  <tbody>
    @foreach ($permissions as $permission)

    <tr>
      <th scope="row">{{$permission->id}}</th>
      <td>{{$permission->name}}</td>
      <td>
          <a href="{{route('permissions.edit',$permission->id)}}"><i class="far fa-edit"></i></a>
        
          <form style='display: inline;' id ='delete' action="{{route('permissions.destroy',$permission->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <a href='' onclick="event.preventDefault();document.getElementById('delete').submit();">
              <i class="far fa-trash-alt"></i>
            </a>
        </form>
    
    
    </td>
    
      

    </tr>
        
    @endforeach
   
   
  </tbody>
</table>
</div>
    
@endsection