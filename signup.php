<?php require_once('partials/header.php') ?>
<?php if(!$dbCon->getCurrentUser()){ ?>
<div id='login_section' class="container">
  <div class="col-md-offset-4 col-md-4">
    <img src="img/logo.png"/>
    <form id="login-form" class="text-left" method="post">
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">
            <label for="lg_username" class="sr-only">Username</label>
            <input type="text" class="form-control" id="lg_username" name="username" placeholder="username" required>
            <input type="hidden" class="form-control" name="register">
          </div>
          <div class="form-group">
            <label for="lg_password" class="sr-only">Password</label>
            <input type="password" class="form-control" name="password" placeholder="password" required>
          </div>

          <div class="form-group">
            <label for="lg_password" class="sr-only">Password</label>
            <select name="role_id">
              <option value="1" selected>user</option>
              <option value="2">moderator</option>
              <option value="3">administrator</option>
            </select>
          </div>

        </div>
        <button type="submit" class="btn btn-info login-button"> Register </button>
      </div>
      <div class="etc-login-form">
        <p>Login? <a href="index">Login</a></p>
      </div>
    </form>
  </div>
</div>
<?php }else{ ?>
<?php require_once('partials/menu.php') ?>
<?php } ?>
<?php require_once('partials/footer.php') ?>
