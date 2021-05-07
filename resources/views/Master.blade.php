<!DOCTYPE html>
<html lang="en">
    <head>
@include('user.layouts.header')
    </head>

<body>
    @yield('loader')

    
    



    @yield('content')



</body>

@yield('Footer')



@include('user.layouts.scripts')
@yield('my-scripts')

</html>
