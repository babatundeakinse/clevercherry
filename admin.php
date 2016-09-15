<?php require_once('partials/header-auth.php') ?>
<?php if($dbCon->getCurrentUser()){ ?>
  <div id='login_section' class="container">
    <div class="col-md-offset-3 col-md-6">
      <div class="content">
        <?php $user = $dbCon->getCurrentUser(); ?>
        <?php if($user){ ?>
            <?php if($dbCon->getUserRole("administrator")){ ?>
            <h1>Admin Section <br/> Logged In as <br/> { <?php echo $user["username"] ?> }</h1>
            <ul>
            <?php if($dbCon->getUserRole("administrator")) echo '<li><a href="admin.php">View Admin Page</a></li>'; ?>
            <?php if($dbCon->getUserRole("user")) echo '<li><a href="user.php">View User Page</a></li>'; ?>
            <?php if($dbCon->getUserRole("moderator")) echo '<li><a href="moderator.php">View Moderator</a></li>'; ?>
            <a href="logout.php">Logout</a>
            </ul>
            <?php }else{ ?>
                <h1>Oops You don't have permision to view this page </h1>
                <a href="index">Back</a>
            <?php  } ?>
        <?php }else{
            header("Location: index.php");
         } ?>
      </div>
    </div>
  </div>
<?php } ?>
<?php require_once('partials/footer.php') ?>
