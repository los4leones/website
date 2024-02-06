<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Los 4 Leones | MiniMarket</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="" style="width: 158px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="index.php">Inicio</a></li>
                      <li><a href="shop.php">Nuestra Tienda</a></li>
                      <li><a href="contact.php">Contáctanos</a></li>
                      <li><a href="forms.php"><img src="assets/images/login.png" alt="" style="width: 40px;": ></a></li>
                      <li class="shopping">
                          <img src="assets/images/scart.gif" alt="" style="width: 40px;">
                          <span class="quantity">0</span>
                      </li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h3>Inicia Sesión o Registrate</h3>
              <span class="breadcrumb"><a href="#">Inicio</a>  >  Inicia sesión o Registrate</span>
            </div>
          </div>
        </div>
      </div> 
  <!-- Register Form -->
  <div class="register-form">
    <h2>Registrate</h2>
    <?php
   include("ConexionBDD.php");
    ?>
    <form action="usuario_registro.php" method="post">
      <input type="text" placeholder="Nombre de usuario" autocomplete="on" name="username" required>
      <input type="email" placeholder="Email" autocomplete="on" name="email" required>
      <input type="password" placeholder="Contraseña" autocomplete="on" name="password" required>
      <input type="text" placeholder="Nombre" autocomplete="on" name="first_name" required>
      <input type="text" placeholder="Apellido" autocomplete="on" name="last_name" required>
      <input type="text" placeholder="Dirección" autocomplete="on" name="address" required>
      <input type="tel" placeholder="Número de teléfono" autocomplete="on" name="phone_number" required>
      <button type="submit" class="btn-register">Registrar</button>
    </form>
  </div>
  </div>
  <div class="card">
  <h1></h1>
  <h1>Carrito de Compras</h1>
  <ul class="listCard"></ul>
  <div class="checkOut">
    <div class="total">0</div>
    <div class="closeShopping">Close</div>
  </div>
</div>

  
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2023 Los 4 Leones. Derechos Reservados. &nbsp;&nbsp; </p>
        <a href="https://wa.link/172kp7" style="display: flex; justify-content: center">
          <img src="assets/images/servicio-al-cliente.png" alt="" style="width: 200px;">
        </a>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/app.js"></script>
  

  <script type="text/javascript">
        window.onload = function() {
            <?php if (isset($_SESSION['mensaje'])): ?>
                alert("<?php echo addslashes($_SESSION['mensaje']); ?>");
                <?php unset($_SESSION['mensaje']); ?>
            <?php endif; ?>
        };
    </script>
  </body>
</html>