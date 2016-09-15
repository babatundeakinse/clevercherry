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
            <input type="hidden" class="form-control" name="login">
          </div>
          <div class="form-group">
            <label for="lg_password" class="sr-only">Password</label>
            <input type="password" class="form-control" name="password" placeholder="password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-info login-button"> Login </button>
      </div>
      <div class="etc-login-form">
        <p>New user? <a href="signup.php">Register Now</a></p>
      </div>
    </form>
  </div>
</div>
<?php }else{ ?>
  <div id='login_section' class="container">
    <div class="col-md-offset-3 col-md-6">
      <div class="content">
        <?php $user = $dbCon->getCurrentUser(); ?>
        <h1>Logged In as <br/> { <?php echo $user["username"] ?> }</h1>
        <ul>
        <?php if($dbCon->getUserRole("administrator")) echo '<li><a href="admin.php">View Admin Page</a></li>'; ?>
        <?php if($dbCon->getUserRole("user")) echo '<li><a href="user.php">View User Page</a></li>'; ?>
        <?php if($dbCon->getUserRole("moderator")) echo '<li><a href="moderator.php">View Moderator</a></li>'; ?>
        <a href="logout.php">Logout</a>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>
<?php require_once('partials/footer.php') ?>
