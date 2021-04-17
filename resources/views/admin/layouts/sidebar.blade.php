<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text ml-5">Blogger</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link active">
                  <i class="fab fa-buffer nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Blog Control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('posts.index')}}" class="nav-link">
                  <i class="far fa-newspaper nav-icon"></i>
                  <p>Posts</p>
                </a>
              </li>
              @can('cats', Auth::user())
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="fas fa-braille nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              @endcan
              @can('tags', Auth::user())
              <li class="nav-item">
                <a href="{{route('tags.index')}}" class="nav-link">
                  <i class="fas fa-tags nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
              @endcan
              @can('users', Auth::user())

              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              @endcan
              @can('user.roles', Auth::user())

              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="fas fa-user-tag nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              @can('permissions', Auth::user())

              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
              @endcan
              @can('assign.permissions', Auth::user())


              <li class="nav-item">
                <a href="{{route('assing_permissions.index')}}" class="nav-link">
                  <i class="fas fa-user-lock nav-icon"></i>
                  <p>Assing Permissions</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        </ul>
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>