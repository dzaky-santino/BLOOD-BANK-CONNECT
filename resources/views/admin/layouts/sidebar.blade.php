  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ url('admin/dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-clipboard-data"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ url('admin/data_admin') }}">
                          <i class="bi bi-circle"></i><span>Admin</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ url('admin/bank_darah') }}">
                          <i class="bi bi-circle"></i><span>Bank Darah</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ url('admin/dokter') }}">
                          <i class="bi bi-circle"></i><span>Dokter</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ url('admin/pendonor') }}">
                          <i class="bi bi-circle"></i><span>Pendonor</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ url('admin/penerima') }}">
                          <i class="bi bi-circle"></i><span>Penerima</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Components Nav -->

          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('admin/profile') }}">
                  <i class="bi bi-person"></i>
                  <span>Profil</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ url('/') }}">
                  <i class="bi bi-house"></i>
                  <span>Beranda</span>
              </a>
          </li>
      </ul>

  </aside><!-- End Sidebar-->
