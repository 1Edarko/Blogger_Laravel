<!DOCTYPE html>
<html lang="en">
  @include('admin.layouts.head')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  @include('admin.layouts.navbar')

  @include('admin.layouts.sidebar')

  @yield('content')

 
  

</div>

@yield('second-content')






@include('admin.layouts.footer')



    
@include('admin.layouts.scripts')
@yield('script')
</body>
</html>
