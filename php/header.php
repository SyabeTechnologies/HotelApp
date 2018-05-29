<header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="../home/dashboard.php" class="navbar-brand">
          <span class="hidden-nav-xs">HotelApp</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span>
              <?php echo $_SESSION['nomuser']; ?> <b class="caret"></b>
            </span>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <li>
              <a href="../home/edit_password.php">Modifier le mot de passe</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="../logout.php" onclick="return confirm('Voulez-vous vraiment vous déconnectez ?')"  >Se déconnecter</a>
            </li>
          </ul>
        </li>
      </ul>      
</header>