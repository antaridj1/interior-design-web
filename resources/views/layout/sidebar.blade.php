<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{Request::is('home') || Request::is('profile')? '' : 'collapsed'}}" href="{{route('home')}}">
          <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{Route::is('laporan.edit', 'laporan.index', 'laporan.show')? '' : 'collapsed'}}" href="{{route('laporan.index')}}">
          <i class="bi bi-journal-text"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (auth()->user()->role === 'unit')
          <li class="nav-item">
            <a class="nav-link {{Route::is('laporan.create')? '' : 'collapsed'}}" href="{{route('laporan.create')}}">
              <i class="bi bi-pencil"></i>
              <span>Buat Laporan</span>
            </a>
        </li>

      @elseif (auth()->user()->role === 'master_admin')
      <li class="nav-item">
        <a class="nav-link {{Route::is('pegawai.edit', 'pegawai.index', 'pegawai.create')? '' : 'collapsed'}}" href="{{route('pegawai.index')}}">
          <i class="bi bi-people"></i>
          <span>Pegawai</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{Route::is('unit.edit', 'unit.index', 'unit.create')? '' : 'collapsed'}}" href="{{route('unit.index')}}">
          <i class="bi bi-bank"></i>
          <span>Unit BRI</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif

      @if(auth()->user()->role !== 'pegawai')
      <li class="nav-item">
        <a class="nav-link {{Route::is('saran.index', 'saran.create')? '' : 'collapsed'}}" href="{{route('saran.index')}}">
          <i class="bi bi bi-chat-left-text"></i>
          <span>Saran</span>
        </a>
      </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->