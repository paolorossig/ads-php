<?php
    session_start();
    if (!isset($_SESSION["codUsuario"])){
      session_destroy();
      header("Location:index.html");
      exit;
    }

    $rol = $_SESSION["rol"];
    $enlace = mysqli_connect("localhost","root","","GoodCookies");
    $sentencia = "select * from menuxrol where rol='$rol';";
    $resultado_menu = mysqli_query($enlace, $sentencia);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/dashboard.css" />
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <section id="dashboard">
      <nav>
        <h1>
          <a href="inicio.php">
            <span>Good</span> Cookies
          </a>
        </h1>
        <menu>
          <ul>
            <?php
            $currentMenu = str_replace(".php", "", explode("/", $_SERVER['REQUEST_URI'])[1]);
            while ($row_menu = $resultado_menu->fetch_row()) {
                if ($row_menu[3] == $currentMenu) {
                    echo "<li class='active'><a href='$row_menu[3].php'>$row_menu[2]</a></li>";
                } else {
                    echo "<li><a href='$row_menu[3].php'>$row_menu[2]</a></li>";
                }
            }
            ?>
          </ul>
        </menu>
      </nav>
      <div class="dashboard_rigth">
        <header>
          <a href="#">
            <div class="user_profile_card">
              <img
                src="https://res.cloudinary.com/paolorossi/image/upload/v1652998240/spotiparty/user_placeholder_zpoic6.png"
                alt="User Image"
                width="50"
                height="50"
              />
              <div>
                <?php
                    echo "<p>".$_SESSION["displayName"]."</p>";
                    echo "<span>".$_SESSION["rol"]."</span>";
                ?>
              </div>
            </div>
          </a>
        </header>
        <main><?php include($childView); ?></main>
      </div>
    </section>
  </body>
</html>
