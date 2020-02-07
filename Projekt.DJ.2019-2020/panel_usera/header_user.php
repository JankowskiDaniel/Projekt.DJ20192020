<script type="text/javascript">
function logout(){
  alert("Nastąpiło wylogowanie z serwisu.");
}
</script>
          <div class="row no-gutters first_row">
            <div class="header_clear">
            </div>
          <div class="col-lg-8 col-md-10 col-sm-2 my-auto">
          <a href="index_user.php"><h1 class="baner">Nauka Angielskiego</h1></a>
          </div>
          <div class="col-lg-4 col-md-2 col-sm-10 my-auto">
          <div class="buttons">
          <a class="login"><?php echo strtoupper($_SESSION['user']); ?></a>
          <a href="logout.php" class="register" onclick="setTimeout(logout, 40)">Wyloguj</a>

          </div>
          </div>
          <div class="header_clear">
          </div>
        </div>
