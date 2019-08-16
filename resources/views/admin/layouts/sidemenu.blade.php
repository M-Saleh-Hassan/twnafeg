<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    {{-- <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form --> --}}

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="{{route('admin.home.index')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>

      <li><a href="{{route('admin.media.index')}}"><i class="fa fa-link"></i> <span>Media</span></a></li>

      <li><a href="{{route('admin.slides.index')}}"><i class="fa fa-link"></i> <span>Home Slider</span></a></li>

      <li><a href="{{route('admin.events.index')}}"><i class="fa fa-link"></i> <span>Events</span></a></li>

      <li><a href="{{route('admin.testimonials.index')}}"><i class="fa fa-link"></i> <span>Testimonials</span></a></li>

      <li><a href="{{route('admin.news.index')}}"><i class="fa fa-link"></i> <span>News</span></a></li>

      <li><a href="{{route('admin.vision.index')}}"><i class="fa fa-link"></i> <span>Vision</span></a></li>

      <li><a href="{{route('admin.settings.index')}}"><i class="fa fa-link"></i> <span>Settings</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
