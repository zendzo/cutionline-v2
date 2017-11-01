<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset("AdminLTE/dist/img/user-avatar.png") }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->fullName() }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online ({{ Auth::user()->role->name }})</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i><span>Menu Utama</span></a></li>
      <!-- if user is admin show menu -->
      @if(Auth::user()->role_id === 1)
        @include('layouts.menus.menu_pegawai')
        @include('layouts.menus.menu_cuti_type')
        @include('layouts.menus.menu_laporan')
        @include('layouts.menus.menu_setting')
      @endif
      
      @if(Auth::user()->role_id != 1)
        <!-- user menu -->
        @include('layouts.menus.menu_cuti')
        @include('layouts.menus.menu_claim_cuti')
      @endif
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>