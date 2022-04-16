
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('lte/dist/img/Branding-01.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Afriandry F.R.</p>
          <!-- Status -->
          <a href="#"> 352141009</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> --}}
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{URL::to('/')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="{{ (request()->is('pertemuan-pertama')) ? 'active' : '' }}"><a href="{{URL::to('pertemuan-pertama')}}"><i class="fa fa-database"></i> <span>Pertemuan Pertama</span></a></li>
        <li class="{{ (request()->is('tugas-pertama')) ? 'active' : '' }}"><a href="{{URL::to('tugas-pertama')}}"><i class="fa fa-database"></i> <span>Tugas Pertama</span></a></li>
        <li class="{{ (request()->is('uts')) ? 'active' : '' }}"><a href="{{URL::to('uts')}}"><i class="fa fa-database"></i> <span>UTS</span></a></li>
        <li class="{{ (request()->is('thr')) ? 'active' : '' }}"><a href="{{URL::to('thr')}}"><i class="fa fa-database"></i> <span>Tugas Kelompok</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>