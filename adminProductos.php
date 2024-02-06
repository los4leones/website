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
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  
  <style>
        table {
            border-collapse: collapse;            
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
  
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
          
              <li><a href="shop_admin.php">Nuestra Tienda</a></li>
              <li><a href="adminProductos.php">Productos</a></li>        
			        <li><a href="pagina_administracion.php"><img src="assets/images/login.png" alt="" style="width: 40px;": ></a></li>
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
          <h3>Datos de Productos</h3>
          <span class="breadcrumb"><a href="#">Datos</a> > Datos</span>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Form -->
  <div>
    <form id="index" action="adminProductos.php" method="post">
		<?php
			include("ConexionBDD.php");
			$obj=new ConexionBDD;
		?>
		<br>
  <div>
    <div class="register-form">
        <label  for="ddldep">Categorías:</label>
        <select name="ddldep" id="ddldep">
            <?php
            // Suponiendo que $obj es una instancia de tu objeto de conexión a la base de datos
            $result = $obj->Consultar("SELECT cat_nombre FROM categoria");
            while ($vector = mysqli_fetch_array($result)) {
                echo "<option value='" . htmlspecialchars($vector['cat_nombre']) . "'>" . htmlspecialchars($vector['cat_nombre']) . "</option>";
            }
            ?>
        </select>
    </div>
    <div class=register-form>
        <input type="submit" name="proc" value="Consultar" width="100"/>
    </div>
</div>

<?php
if (isset($_POST['proc'])) {
    $ddldep = $_POST['ddldep'];
    $resulset = $obj->Consultar("SELECT a.pro_id, a.pro_nombre, a.pro_precio, a.pro_precio_anterior, a.pro_imagen FROM producto a INNER JOIN categoria b ON a.cat_id = b.cat_id WHERE b.cat_nombre = '$ddldep'");

    echo "<div class='register-form'>";
    $band = 0;

    while ($vector3 = mysqli_fetch_array($resulset)) {
        if ($band == 0) {
            echo "<div class='producto-header'>Lista Productos - Categoría</div>";
            $band = 1;
        }
        echo "<div class='producto'>";
        echo "<div class='producto-field'><b>Id:</b> " . $vector3['pro_id'] . "</div>";
        echo "<div class='producto-field'><b>Nombre:</b> " . htmlspecialchars($vector3['pro_nombre'], ENT_QUOTES, 'UTF-8') . "</div>";
        echo "<div class='producto-field'><b>Precio:</b> " . $vector3['pro_precio'] . "</div>";
        echo "<div class='producto-field'><b>Precio Anterior:</b> " . $vector3['pro_precio_anterior'] . "</div>";
        echo "<div class='producto-field'><img src='" . $vector3['pro_imagen'] . "' alt='Imagen del producto' style='max-width:100%;height:auto;'></div>";
        echo "</div>";
    }

    echo "</div>"; // Cierre de productos-container
}
?>

		
    <div class="register-form">
  <form>
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre">
    </div>
    <div class="form-group">
      <label for="precio">Precio</label>
      <input type="text" id="precio" name="precio">
    </div>
    <div class="form-group">
      <label for="precio_anterior">Precio Anterior</label>
      <input type="text" id="precio_anterior" name="precio_anterior">
    </div>
    <div class="form-group">
      <label for="ruta">Ruta Imagen</label>
      <input type="text" id="ruta" name="ruta">
    </div>
    <div class="form-group">
      <input type="submit" name="guardar" value="Guardar">
    </div>
  </form>
</div>
		<?php
		  if (isset($_POST['guardar'])) {
        

        $nombre = mysqli_real_escape_string($obj->getConexion(), $_POST['nombre']);
        $precio = mysqli_real_escape_string($obj->getConexion(), $_POST['precio']);
        $precio_anterior = mysqli_real_escape_string($obj->getConexion(), $_POST['precio_anterior']);
        $ruta = mysqli_real_escape_string($obj->getConexion(), $_POST['ruta']);
        $ddldep = mysqli_real_escape_string($obj->getConexion(), $_POST['ddldep']);

        if (empty($nombre) || empty($precio) || empty($precio_anterior) || empty($ruta)) {
          ?>
          <script>
            alert("Debe completar todos los campos");
          </script>
          <?php
        } else {
          $cat_id = 0;
          $resul1 = $obj->Consultar("SELECT cat_id FROM categoria WHERE cat_nombre='$ddldep'");
          if ($vector1 = mysqli_fetch_array($resul1)) {
            $cat_id = $vector1[0];
            mysqli_free_result($resul1);
          }

          $insert_query = "INSERT INTO producto(cat_id, pro_nombre, pro_precio, pro_precio_anterior, pro_imagen) VALUES ($cat_id, '$nombre', $precio, $precio_anterior, '$ruta')";
          //print($insert_query);
          echo "<center><b>" . $obj->Insertar($insert_query) . "</b></center>";
        }
      }
      ?>

		
		
	</form>
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
      <?php if (isset($_SESSION['mensaje'])) { ?>
        alert("<?php echo $_SESSION['mensaje']; ?>");
      <?php unset($_SESSION['mensaje']); ?>
      <?php } ?>
    };
  </script>
</body>

</html>
