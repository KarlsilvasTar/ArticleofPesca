<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Artículos de Pesca</title>
  <!-- Estilo de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Personalización */
    .carousel-inner img {
      height: 400px;
      object-fit: cover;
    }

    .carousel-caption h1 {
      font-size: 2.5rem;
    }

    .carousel-caption h2 {
      font-size: 1.5rem;
    }

    .carousel-caption .boton {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.7rem 1.5rem;
      color: white;
      background-color: #008080;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
    }

    .carousel-caption .boton:hover {
      background-color: #005555;
    }
  </style>
</head>
<body>
<?php session_start(); ?>
<!-- Menú de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ArticleofPesca</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productos.php">Productos</a>
                </li>

                <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true): ?>
                    <!-- Mostrar solo si el administrador ha iniciado sesión -->
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Panel Admin</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION["usuario"]) || isset($_SESSION["admin"])): ?>
                    <!-- Mostrar "Cerrar Sesión" si hay un usuario o administrador autenticado -->
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <!-- Mostrar "Iniciar Sesión" si nadie ha iniciado sesión -->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


  <!-- Carrusel -->
  <div id="pescaCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <!-- Imagen 1 -->
      <div class="carousel-item active">
        <img src="images/chinchorro.jpg" class="d-block w-100" alt="Chichorro">
        <div class="carousel-caption">
          <h1>Explora el mundo de la pesca</h1>
          <h2>Todo lo que necesitas para tus aventuras al aire libre</h2>
          <a href="#" class="boton">EXPLORA AHORA</a>
        </div>
      </div>
      <!-- Imagen 2 -->
      <div class="carousel-item">
        <img src="images/carrusel1.jpg" class="d-block w-100" alt="Pesca en el río">
        <div class="carousel-caption">
          <h1>Equipo de calidad</h1>
          <h2>Productos diseñados para mejorar tu experiencia</h2>
          <a href="#" class="boton">DESCÚBRELO</a>
        </div>
      </div>
      <!-- Imagen 3 -->
      <div class="carousel-item">
        <img src="images/carrusel2.jpg" class="d-block w-100" alt="Atardecer en el lago">
        <div class="carousel-caption">
          <h1>Accesorios esenciales</h1>
          <h2>Haz de tus aventuras un éxito</h2>
          <a href="#" class="boton">VER MÁS</a>
        </div>
      </div>
    </div>
    <!-- Controles del Carrusel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#pescaCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#pescaCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Script de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<!-- Sección Acerca de -->
<footer class="bg-dark text-white py-5">
    <div class="container">
      <!-- Título principal -->
      <div class="text-center mb-5">
        <h3>Acerca de ArticleofPesca</h3>
        <p>
          En ArticleofPesca, creemos en ofrecer lo mejor para los amantes de la naturaleza y la aventura.
          Conoce más sobre quiénes somos y lo que hacemos.
        </p>
      </div>
  
      <!-- Imágenes con cuadros de texto -->
      <div class="row mt-4">
        <!-- Cuadro 1 -->
        <div class="col-md-4 d-flex flex-column align-items-center mb-4">
          <img src="images/imagen de 1 texto de descripcion.webp" alt="Nuestra Misión" class="img-fluid rounded mb-3 igual-height">
          <h4 class="mb-2">Nuestra Misión</h4>
          <p>
            En ArticleofPesca, nos dedicamos a proporcionar a los entusiastas de la caza y la pesca los mejores productos y servicios. 
            Nuestro objetivo es fomentar una comunidad apasionada que valore la naturaleza y la aventura al aire libre.
          </p>
        </div>
          
        <!-- Cuadro 2 -->
        <div class="col-md-4 d-flex flex-column align-items-center mb-4">
          <img src="images/imagen de 2 texto de descripcion.webp" alt="Productos de Calidad" class="img-fluid rounded mb-3 igual-height">
          <h4 class="mb-2">Productos de Calidad</h4>
          <p>
            Ofrecemos una amplia gama de artículos de caza y pesca, desde cañas y carretes hasta ropa especializada. 
            Todos nuestros productos son seleccionados cuidadosamente para garantizar la más alta calidad y satisfacción del cliente.
          </p>
        </div>
          
        <!-- Cuadro 3 -->
        <div class="col-md-4 d-flex flex-column align-items-center mb-4">
          <img src="images/imagen de 3 texto de descripcion.webp" alt="Expertos en Aventura" class="img-fluid rounded mb-3 igual-height">
          <h4 class="mb-2">Expertos en Aventura</h4>
          <p>
            Nuestro equipo está compuesto por expertos en caza y pesca que están listos para compartir su conocimiento. 
            Ofrecemos consejos y trucos para que cada experiencia al aire libre sea memorable y exitosa.
          </p>
        </div>
      </div>
  
      <html lang="es">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>ArticleofPesca</title>
          <link rel="stylesheet" href="styles.css">
        </head>
        <body>
          <!-- Encabezado -->
          <header>
            <h1>Bienvenido a ArticleofPesca</h1>
            <p>Todo lo que necesitas para tus aventuras de pesca</p>
          </header>
        
          <!-- Sección del Video -->
          <section class="video-section">
            <h2>Disfruta de nuestra pasión por la pesca</h2>
            <video width="100%" controls>
              <source src="video/invideo-ai-1080 ¡Descubre la pesca en Huila y el mundo!  2025-01-19.mp4" type="video/mp4">
              Tu navegador no soporta la reproducción de videos.
            </video>
          </section>
        
          <!-- Sección de Productos -->
          <section class="products-section">
            <h2>Productos Destacados</h2>
            <div class="products-container">
              <!-- Producto 1 -->
              <div class="product-card rotate-left">
                <img src="images/anzuelosdepesca.png" alt="Anzuelos de pesca" class="product-image">
                <h3>Anzuelos de pesca</h3>
                <p>Precio: $60.000 COP</p>
                <p>79 piezas Kit de Cebos de pesca, señuelos de alta calidad para atraer a los peces más difíciles.</p>
              </div>
        
              <!-- Producto 2 -->
              <div class="product-card rotate-right">
                <img src="images/careta de buceo.webp" alt="Careta de Pesca" class="product-image">
                <h3>Careta de Pesca</h3>
                <p>Precio: $85,000 COP</p>
                <p>Careta Clásica Redonda, Máscara de Buceo de Silicona de Vista Ancha Sin Marco para Mergulleo Libre.</p>
              </div>
        
              <!-- Producto 3 -->
              <div class="product-card rotate-left">
                <img src="images/cressi-sub-55.webp" alt="Cressi Sub-55" class="product-image">
                <h3>Caja de Herramientas</h3>
                <p>Precio: $1.550,000 COP</p>
                <p>La gama SL de fusiles neumáticos ha estado en producción durante muchos años y han ganado fama mundial por su excelencia en términos de robustez, fiabilidad, precisión y fuerza de disparo. Cressi Sub 55 libras de presión</p>
              </div>
        
              <!-- Producto 4 -->
              <div class="product-card rotate-right">
                <img src="images/traje de buceo.png" alt="traje de buceo" class="product-image">
                <h3>Traje de buceo</h3>
                <p>Precio: $350,000 COP</p>
                <p>Traje de Neoprano de Alta Calidad, Redimientos para Hombres - Proteccion Termica de 3/2.</p>
              </div>
        
              <!-- Producto 5 -->
              <div class="product-card rotate-left">
                <img src="images/nylondepesca.png" alt="nylon de pesca" class="product-image">
                <h3>Nylon de pesca</h3>
                <p>Precio: $40,000 COP</p>
                <p>500m Línea de pesca, Fuerte y Resistente.</p>
              </div>
        
              <!-- Producto 6 -->
              <div class="product-card rotate-left">
                <img src="images/linterna acuatica.webp" alt="Linterna Acuática" class="product-image">
                <h3>Linterna Acuática</h3>
                <p>Precio: $30,000 COP</p>
                <p>500m Línea de pesca, Fuerte y Resistente.</p>
              </div>
            </div>
          </section>
        </body>
        </html>
        

  
  <!-- Estilos CSS -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }

    header {
      background-color: #007bff;
      color: white;
      text-align: center;
      padding: 1rem;
    }

    .video-section {
      text-align: center;
      margin: 2rem 0;
    }

    .products-section {
      padding: 2rem;
      background-color: #f4f4f4;
      text-align: center;
    }

    .products-section h2 {
      margin-bottom: 1.5rem;
      color: #333;
    }

    .products-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 1.5rem;
    }

    .product-card {
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 1rem;
      max-width: 300px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transform: perspective(1000px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
      transform: perspective(1000px) scale(1.05);
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    .product-image {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    .product-card h3 {
      color: #007bff;
      margin-bottom: 0.5rem;
    }

    .product-card p {
      color: #555;
      margin: 0.5rem 0;
    }

    /* Efectos de rotación */
    .rotate-left {
      transform: rotate(-3deg);
    }

    .rotate-right {
      transform: rotate(3deg);
    }
  </style>
</body>
</html>



      <!-- Texto debajo del video -->
      <div class="mt-5 text-center">
        <h3 class="comunicarse-texto">Comunícate con nosotros</h3>
      </div>
  
      <!-- Sección de visita -->
      <div class="row mt-4 mb-5">
        <!-- Texto izquierdo -->
        <div class="col-md-6">
          <h4>O, aún mejor, ¡ven a visitarnos!</h4>
          <p>Nos encanta recibir a nuestros clientes, así que ven en cualquier momento durante las horas de oficina.</p>
        </div>
        <!-- Imagen derecha -->
        <div class="col-md-6 d-flex justify-content-center">
          <img src="images/menu.jpg" alt="Visítanos" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
      </div>
  
      <!-- Enlace WhatsApp con icono y texto alineado a la izquierda -->
      <div class="mt-5 text-left">
        <p>Envíanos un mensaje:</p>
        <a href="https://wa.me/3142102812" target="_blank" class="btn btn-success d-inline-flex align-items-center">
          <i class="fab fa-whatsapp" style="font-size: 24px;"></i> Envíanos un mensaje por WhatsApp
        </a>
      </div>
  
      <!-- Información adicional debajo de WhatsApp -->
      <div class="mt-4 text-left">
        <p><strong>ArticleofPesca</strong></p>
        <p>Colombia</p>
        <p>Huila</p>
        <p><strong>Teléfono: 3142102812</strong></p>
  
        <!-- Horario de atención -->
        <div class="mt-4">
          <h5>Horario de Atención</h5>
          <p><strong>Lunes a Viernes:</strong> 8:30 A.M - 7:30 P.M</p>
          <p><strong>Sábados:</strong> 9:00 A.M - 2:00 P.M</p>
          <p><strong>Domingos:</strong> Cerrado</p>
        </div>
      </div>
  
      <!-- Sección de Conéctate con nosotros -->
      <div class="text-center mt-5">
        <h3>Conéctate con nosotros</h3>
  
        <!-- Redes sociales -->
        <div class="d-flex justify-content-center mt-3">
          <!-- Facebook -->
          <a href="https://www.facebook.com/ArticleofPesca" target="_blank" class="mx-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" style="width: 40px; height: 40px;">
          </a>
          
          <!-- Instagram -->
          <a href="https://www.instagram.com/ArticleofPesca" target="_blank" class="mx-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" style="width: 40px; height: 40px;">
          </a>
          
          <!-- Tiktok -->
          <a href="https://www.tiktok.com/@ArticleofPesca" target="_blank" class="mx-3">
            <img src="images/tiktoklogo.png" alt="TikTok" style="width: 40px; height: 40px;">
          </a>
          

          
          <!-- YouTube -->
          <a href="https://www.youtube.com/c/ArticleofPesca" target="_blank" class="mx-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" alt="YouTube" style="width: 40px; height: 40px;">
          </a>
        </div>
      </div>
    </div>
  </footer>
  
 
     
  
  
  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp Flotante</title>
    <!-- Font Awesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos del botón flotante */
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25D366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            text-decoration: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .whatsapp-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
        }

        /* Adaptación para móviles */
        @media (max-width: 600px) {
            .whatsapp-button {
                width: 50px;
                height: 50px;
                font-size: 24px;
                bottom: 15px;
                right: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Botón de WhatsApp flotante -->
    <a href="https://wa.me/573142102812" target="_blank" class="whatsapp-button">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>
</html>
