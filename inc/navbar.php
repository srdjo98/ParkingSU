<nav class="navbar navbar-expand-lg navbar-dark  mb-3">
  <div class="container">
      <a class="navbar-brand" href="index.php">Su Parking</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Pocetna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#onama">O nama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kontakt">Kontakt</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
            <li class="nav-item">
              <a class="nav-link" id="down" href="chart.php">Statistika</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="down" href="appDownload.php">Preuzmite App</a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="logout.php">Odjavi se</a>
            </li>
          <?php elseif(isset($_SESSION['admin_id'])): ?>
            <li class="nav-item">
              <a class="nav-link" id="down" href="admin.php">Admin</a>
            </li>
          <li class="nav-item">
              <a class="nav-link" href="logout.php">Odjavi se</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="register_view.php">Registrujte se</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login_view.php">Prijavite se</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>