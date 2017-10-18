<!-- Fixed navbar -->

    <nav class="navbar navbar-fixed-top">
      <div class="container" id="userNav">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php
          if (isset($login_session)) {
              echo '<a class="navbar-brand" href="/wtt/forum/forum.php">Home</a>';
            }else{
              echo '<a class="navbar-brand" href="/wtt/general/info.php">Home</a>';
            }
          ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php 
            $test = 2;
            if (isset($login_session)) {
              $result = $db->query('SELECT firstname, lastname, profilepic FROM user WHERE idlogin='.$login_session.';');
              $row = $result->fetch_assoc();
              echo '<a class="navbar-brand" href="/wtt/user/profile.php"><div class="profilepic"><img src="/wtt/user'.$row['profilepic'].'"></div>'.$row['firstname'].' '.$row['lastname'].'</a>';
              echo '<li><a href="#">Messages</a></li>';
              echo '<li><a href="#">Notifications</a></li>';
              echo '<li><a href="/wtt/login/logout.php?curpage='.$_SERVER['REQUEST_URI'].'">Abmelden </a></li>';
            }else{
              echo '<li><a href="/wtt/user/register/register.php">Registrieren</a></li>';
              echo '<li><form action="/wtt/login/userlogin.php" method="post">
                        <input type="hidden" name="cursite" value="'.$_SERVER['REQUEST_URI'].'">
                        <button type="submit" class="btn btn-default postbtn" value="Submit">Anmelden</button>
                    </form></li>';
            }
          ?>
          </ul>
        </div>
      </div>
    </nav>