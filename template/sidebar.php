<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  
                  <?php
                    if (isset($_SESSION['user_details'])) {
                        $userDetails = $_SESSION['user_details'];
                        echo '<span class="font-weight-bold mb-2">' . $userDetails['name'] . ' ' . $userDetails['last_name'] . '</span>';
                    }
                    ?>
                  <span class="text-secondary text-small">Jefe de Proyecto</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/purple/">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="/purple/visitantes">
                <span class="menu-title">Lo mas visto</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/purple/graficos">
                <span class="menu-title">Estadistica</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Administracion</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/purple/dashboard-main">Admin Main</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/purple/admin-cat">Admin Categoria</a></li> -->
                  <li class="nav-item"> <a class="nav-link" href="/purple/admin-single">Admin Single</a></li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/purple/configuracion">
                <span class="menu-title">Configuracion</span>
                <i class="mdi mdi-cog-large cog-icon"></i>
              </a>
            </li>
          </ul>
        </nav>