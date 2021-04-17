@extends('admin.Master')


<div class="container">

    @section('content')
<div class="content-wrapper">

  <section class="content-header">

    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
     
    </div>
    </section>


    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

            <div class="info-box-content">
              <a href="{{route('posts.index')}}"><span class="info-box-text">Posts</span></a> 
              <span class="info-box-number">
                {{$posts->count()}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @can('cats', Auth::user())

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-braille"></i></span>

            <div class="info-box-content">
              <a href="{{route('categories.index')}}"><span class="info-box-text">Categories</span></a> 
              <span class="info-box-number"> {{$cats->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endcan
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        @can('tags', Auth::user())

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>

            <div class="info-box-content">
              <a href="{{route('tags.index')}}"><span class="info-box-text">Tags</span></a> 
              <span class="info-box-number">{{$tags->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endcan
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          @can('users', Auth::user())

          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <a href="{{route('users.index')}}"><span class="info-box-text">Users</span></a> 
              <span class="info-box-number">{{$users->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          @endcan
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
















</div>
    @endsection






</div>

