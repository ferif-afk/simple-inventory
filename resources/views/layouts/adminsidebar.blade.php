<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Bernd</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Be</a>
          </div>
          <ul class="sidebar-menu">
            @if(auth()->user()->role == 'admin')
            <li class="">
                <a class="nav-link" href="{{ url('/') }}"><i class="far fa-square"></i> <span>Dashboard</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{ url('/fakultas') }}"><i class="far fa-square"></i> <span>Fakultas</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{ url('/jurusan') }}"><i class="far fa-square"></i> <span>Jurusan</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{ url('/ruangan') }}"><i class="far fa-square"></i> <span>Ruangan</span></a>
              </li>
              @endif
              <li class="">
                <a class="nav-link" href="{{ url('/barang') }}"><i class="far fa-square"></i> <span>Barang</span></a>
              </li>
          </ul>
        </aside>
      </div>