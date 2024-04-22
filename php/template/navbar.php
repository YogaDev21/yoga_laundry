<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="../view/control.php?page=dashboard">
      <img src="../../assets/logo.png" width="120px" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
          <img src="../../assets/logo.png" width="150px" />
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <?php
          if (@$_SESSION['level_user'] === "admin") {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Data Master
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="../view/control.php?page=view_outlet">Outlet</a></li>
                <li><a class="dropdown-item" href="../view/control.php?page=view_paket">Paket</a></li>
                <li><a class="dropdown-item" href="../view/control.php?page=view_user">User</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_member">Registrasi Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_transaksi">Entri Transaksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_laporan">Laporan</a>
            </li>
          <?php
          } elseif (@$_SESSION['level_user'] === "kasir") {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_member">Registrasi Member</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_transaksi">Entri Transaksi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_laporan">Laporan</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="../view/control.php?page=view_laporan">Laporan</a>
            </li>
          <?php
          }
          ?>
        </ul>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
            </ul>
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['username'] ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>