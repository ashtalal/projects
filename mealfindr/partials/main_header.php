<nav class="navbar navbar-transparent navbar-fixed-top navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="font-family: 'Nunito', sans-serif; font-size: 35px; color: maroon; font-weight: bolder;">MealFindr</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="font-family: 'Nunito', sans-serif; font-size: 18px; font-weight: bolder;">
        <?php

        if (isset($_SESSION['current_user'])) {
          echo '
            <li>
              <a href="profile.php">' . ucfirst($_SESSION['current_user']) . '</a>
            </li>
          ';
        }

        ?>
        <li>
          <a href="cart.php">My Cart
            <?php
            if (isset($_SESSION['item_count'])) {
              echo '
                <strong style="color:red;">('.$_SESSION['item_count'].')</strong>
              ';
            }
            ?>

          </a>
        </li>
        <li>
          <a href="catalog.php">Dishes</a>
        </li>
        <li>
          <a href="about.php">About Us</a>
        </li>
        <li>
          <a href="create_new_item.php">Sell Meals</a>
        </li>
        <?php

        if (isset($_SESSION['current_user'])) {
          // echo '
          //   <li>
          //     <a href="profile.php">Profile</a>
          //   </li>
          // ';

          if ($_SESSION['role'] == 'admin') {
            echo '
              <li>
                <a href="settings.php">Settings</a>
              </li>
            ';
          }
        }
        
        ?>
        <?php

        if (isset($_SESSION['current_user'])) {
          echo '
            <li>
              <a href="logout.php">Logout</a>
            </li>
          ';
        } else {
          echo '
            <li>
              <a href="login.php">Login</a>
            </li>
            <li>
              <a href="register.php">Register</a>
            </li>
          ';
        }

        ?>
 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
