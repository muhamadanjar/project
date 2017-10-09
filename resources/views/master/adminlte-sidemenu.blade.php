@if(\Auth::check())
<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{ url('home') }}">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
            <span>
              <i></i>
            </span>
          </a>
        </li>

        @if(\Auth::user()->hasRole('admin'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('master/provinsi')}}"><i class="fa fa-circle-o"></i> Provinsi</a></li>
            <li><a href="{{ url('master/kabupaten')}}"><i class="fa fa-circle-o"></i> Kabupaten</a></li>
            <li><a href="{{ url('master/kecamatan')}}"><i class="fa fa-circle-o"></i> Kecamatan</a></li>
            <li><a href="{{ url('master/desa')}}"><i class="fa fa-circle-o"></i> Desa / Nagari</a></li>
          </ul>
        </li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Kuesioner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('kuesioner/tanah')}}"><i class="fa fa-circle-o"></i> Tanah</a></li>
            <li><a href="{{ url('kuesioner/bangunan')}}"><i class="fa fa-circle-o"></i> Bangunan</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ url('dokumen') }}">
            <i class="fa fa-file"></i> <span>Dokumen</span>
            <span>
              <i></i>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ url('map') }}">
            <i class="fa fa-map"></i> <span>Peta</span>
            <span>
              <i></i>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ url('map/view') }}">
            <i class="fa fa-map"></i> <span>Peta ArcGis</span>
            <span>
              <i></i>
            </span>
          </a>
        </li>
        
        @if(\Auth::user()->hasRole('admin'))
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('pengaturan/user')}}"><i class="fa fa-circle-o"></i> Daftar User</a></li>
            
          </ul>
        </li>
        @endif        
</ul>
@endif
