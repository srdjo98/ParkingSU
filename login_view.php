<?php

require_once ('inc/header.php');
require_once ('Users.php');

?>
<div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5 register">
        <h2>PRIJAVA</h2>
        <p>Molimo vas popunite sva polja</p>
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['email_err'])) ? 'is-invalid' : ''; ?> " value="<?php if(!empty($_SESSION['data'])){echo $_SESSION['data']['email']; } ?>">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['email_err'] ?></span>
          </div>
          <div class="form-group">
            <label for="password">Lozinka: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(!empty($_SESSION['data'])){echo $_SESSION['data']['password']; } ?>">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['password_err'] ?></span>
          </div>
          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn  btn-block logbutton">
            </div>
            <div class="col">
              <a href="register_view.php" class="btn btn-light btn-block registerbutton">No account? Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php require_once ('inc/footer.php'); ?>