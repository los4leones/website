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

     
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
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
          <h3>Bienvenido a la Sección de Tienda</h3>
          <span class="breadcrumb"><a href="#">Inicio</a> > Nuestra Tienda</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Mostrar Todo</a>
        </li>
        <li>
          <a href="#!" data-filter=".adv">Bebidas</a>
        </li>
        <li>
          <a href="#!" data-filter=".beba">Bebidas Alcoholicas</a>
        </li>
        <li>
          <a href="#!" data-filter=".str">Alimentos</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Articulos de Limpieza</a>
        </li>
        <li>
          <a href="#!" data-filter=".sna">Snacks</a>
        </li>
      </ul>


        
        
        <div class="row trending-box">
		
		<?php
			include("ConexionBDD.php");
			$obj = new ConexionBDD;
			$result = $obj->Consultar("select a.pro_id,a.pro_imagen,a.pro_precio_anterior,a.pro_precio,a.pro_nombre,b.cat_nombre from producto a inner join categoria b on a.cat_id = b.cat_id");
			if ($result->num_rows - 1 > 0) {
				while ($row = $result->fetch_assoc()) {
					echo '<div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 ' . $row["cat_nombre"] . '">';
					echo '  <div class="item">';
					echo '    <div class="thumb">';
					echo '      <a href="product-details.php?id=' . $row["pro_id"] . '"><img src="' . $row["pro_imagen"] . '" alt=""></a>';
					echo '      <span class="price"><em>$' . $row["pro_precio_anterior"] . '</em>$' . $row["pro_precio"] . '</span>';
					echo '    </div>';    
					echo '    <div class="down-content">';
					echo '      <span class="category">' . $row["cat_nombre"] . '</span>';
					echo '      <h4>' . $row["pro_nombre"] . '</h4>';
					echo '      <a href="product-details.php?id=' . $row["pro_id"] . '"><i class="fa fa-shopping-bag"></i></a>';
					echo '    </div>';
					echo '  </div>';
					echo '</div>';
				}
			} else {
				echo "0 resultados encontrados";
			}
		?>
		        
      </div>

      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
          <li><a href="#"> &lt; </a></li>
            <li><a class="is_active" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div>
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

  <section class="separados">
    <h1>
    </h1>
  </section>
  
  
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2023 Los 4 Leones. Derechos Reservados. &nbsp;&nbsp; </a></p>
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

  </body>
</html>