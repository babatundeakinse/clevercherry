<div class="container">
  <div class="col-md-12">
    <div class="content">
      <?php $user = $dbCon->getCurrentUser(); ?>
      <h1>Logged In as <?php echo $user["username"] ?> </h1>
      <?php if($dbCon->getUserRole("administrator")) echo '<a href="admin.php">View Admin Page</a>'; ?>
      <?php if($dbCon->getUserRole("user")) echo '<a href="user.php">View User Page</a>'; ?>
      <?php if($dbCon->getUserRole("moderator")) echo '<a href="moderator.php">View Moderator</a>'; ?>
      <a href="logout.php">Logout</a>
    </div>
  </div>
</div>
