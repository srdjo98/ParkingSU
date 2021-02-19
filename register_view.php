<?php


require_once ('inc/header.php');
require_once ('Users.php');



?>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5 register">
        <h2>REGISTRACIJA</h2>
        <p>Molimo vas ispunite sva polja za registraciju sa *</p>
        
        <form action="register.php"  method="post">
        
          <div class="form-group">
            <label for="name">Ime: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(!empty($_SESSION['data'])){echo $_SESSION['data']['name']; } ?>">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['name_err'] ?></span>
          </div>
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
          <div class="form-group">
            <label for="confirm_password">Potvrdite lozinku: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['confirm_password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="name">Registarske tablice: <sup>*</sup></label>
            <input type="text" name="register_number" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['register_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(!empty($_SESSION['data'])){echo $_SESSION['data']['register_number']; } ?>">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['register_number_err'] ?></span>
          </div>
          <div class="form-group">
            <label for="name">Registarske tablice : <sup>ⁿᶦʲᵉ ᵒᵇᵃᵛᵉᶻⁿᵒ</sup></label>
            <input type="text" name="register_number1" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['register_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(!empty($_SESSION['data'])){echo $_SESSION['data']['register_number1']; } ?>">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['register_number_err'] ?></span>
          </div>
          <div class="form-group">
            <label for="name">Registarske tablice: <sup>ⁿᶦʲᵉ ᵒᵇᵃᵛᵉᶻⁿᵒ</sup></label>
            <input type="text" name="register_number2" class="form-control form-control-lg <?php echo (!empty($_SESSION['data']['register_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php if(!empty($_SESSION['data'])){echo $_SESSION['data']['register_number2']; } ?>">
            <span class="invalid-feedback"><?php echo $_SESSION['data']['register_number_err'] ?></span>
          </div>
        
          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn  btn-block registerbutton">
            </div>
            <div class="col">
              <a href="login_view.php" class="btn btn-light btn-block logbutton">Have an account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php require_once ('inc/footer.php'); ?>