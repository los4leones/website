<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Los 4 Leones | MiniMarket</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
              <li><a href="product-details.php"><img src="assets/images/scart.gif" alt="" style="width: 40px;": ></a></li>
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
          <h3>Datos de usuario</h3>
          <span class="breadcrumb"><a href="#">Datos</a> > Datos</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Form -->
  <div class="register-form">
    <?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conectar a la base de datos 
include("ConexionBDD.php");
$conexion = new ConexionBDD;

// Datos de usuario definidos
$username = "cesarin";
$password = "12";

// Consulta SQL para buscar al usuario
$sql = "SELECT * FROM users WHERE username = ?";

// Preparar la consulta
$query = $conexion->prepare($sql);
$query->bind_param("s", $username);

// Ejecutar la consulta
$query->execute();

// Obtener resultados
$result = $query->get_result();

if ($result->num_rows == 1) {
    // Usuario encontrado
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Contraseña válida, imprimir los datos del usuario
        echo "<h2>Datos del usuario:</h2>";
        echo "<p>Nombre de usuario: " . $row['username'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>Nombre: " . $row['first_name'] . "</p>";
        echo "<p>Apellido: " . $row['last_name'] . "</p>";
        echo "<p>Dirección: " . $row['address'] . "</p>";
        echo "<p>Número de teléfono: " . $row['phone_number'] . "</p>";
    } else {
        // Contraseña incorrecta, no establecer mensaje de error
        header("Location: register.php");
        exit;
    }
} else {
    // Usuario no encontrado, no establecer mensaje de error
    header("Location: register.php");
}

// Cerrar conexión
mysqli_close($conexion);
?>
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


  <script type="text/javascript">
    window.onload = function() {
      <?php if (isset($_SESSION['mensaje'])) { ?>
        alert("<?php echo $_SESSION['mensaje']; ?>");
      <?php unset($_SESSION['mensaje']); ?>
      <?php } ?>
    };
  </script>
</body>

</html>
