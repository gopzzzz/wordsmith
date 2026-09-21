<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
      


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">

    <span class="brand-text font-weight-light">Dashboard</span>
</a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- SidebarSearch Form -->
      <div class="form-inline">
    <div class="input-group">
        <input
            id="sidebarMenuSearch"
            class="form-control form-control-sidebar"
            type="search"
            placeholder="Search"
            aria-label="Search"
        >

        <div class="input-group-append">
            <button class="btn btn-sidebar" type="button">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
    </div>
</div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <!-- Dashboard -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
         
         <!--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li>

-->




<li class="nav-item">
    <a href="{{ url('/banners') }}" class="nav-link">
        <i class="nav-icon fas fa-images"></i>
        <p>Banners</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/page-edit') }}" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>Page Edit</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/services') }}" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>Services</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/portfolio') }}" class="nav-link">
        <i class="nav-icon fas fa-briefcase"></i>
        <p>Portfolio</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/testimonials') }}" class="nav-link">
        <i class="nav-icon fas fa-comments"></i>
        <p>Testimonials</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('/blogs') }}" class="nav-link">
        <i class="nav-icon fas fa-blog"></i>
        <p>Blogs</p>
    </a>
</li>

<!-- Logout -->
<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
                class="nav-link"
                style="border: none; background: none; width: 100%; text-align: left; color: inherit;">

            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p style="display: inline;">Logout</p>

        </button>
    </form>
</li>

   
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('sidebarMenuSearch');

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener('keyup', function () {

        const searchText = this.value.toLowerCase().trim();

        const menuItems = document.querySelectorAll(
            '.main-sidebar .nav-sidebar > .nav-item'
        );

        menuItems.forEach(function (item) {

            const text = item.innerText.toLowerCase();

            if (searchText === '' || text.includes(searchText)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }

        });

    });

});
</script>