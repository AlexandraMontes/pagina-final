<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Primera página</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Fuente -->
   <link rel="stylesheet" href="BTSarirang.css">
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container">

    <div class="navbar-header">
      <a class="navbar-brand" href="BTSarirang.php">Inicio</a>
    </div>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Unidad 1 <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tarjetas.php">Ver Integrantes</a></li>
            <li><a class="dropdown-item" href="tarjetas.php">Agregar Integrantes</a></li>
            <li><a class="dropdown-item" href="#">BTS</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Unidad 2 <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="relaciones01.php">Miembros</a></li>
            <li><a class="dropdown-item" href="relaciones02.php">Albumes</a></li>
            <li><a class="dropdown-item" href="relaciones03.php">Canciones</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Unidad 3 <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Relaciones</a></li>
            <li><a class="dropdown-item" href="#">Proximamente</a></li>
            <li><a class="dropdown-item" href="#">Extras</a></li>
          </ul>
        </li>

      </ul>
    </div>

  </div>
</nav>

<!-- JUMBOTRON -->
<div class="container">
  <div class="jumbotron text-center">
    <h1>Bienvenidos</h1>
    <p class="lead">
        Explora el mundo de bts.
    </p>
    <hr>
    <p>
        Aquí puedes registrar nuevos Integrantes en la base de datos.
    </p>
    <p>
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
  </div>
</div>
<div>
        <nav class="navbar-light="background-color: #070707ff>
    </div>
</nav>
<div class="container">
    <form action="proceso.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre">
        </div>
        <div class="form-group">
            <label for="nombre_real">Nombre real:</label>
            <input type="text" class="form-control" id="nombre_real">
        </div>
        <div class="form-group">
            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" class="form-control" id="nacionalidad">
        </div>
        <div class="form-group">
            <label for="posicion">Posicion:</label>
            <input type="text" class="form-control" id="posicion">
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" class="form-control" id="foto">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <!-- 🌸 CONTENEDOR DE PETALOS -->
<div class="petalos"></div>

<!-- SCRIPT PETALOS -->
<script>
for (let i = 0; i < 25; i++) {
    let petalo = document.createElement("span");
    petalo.innerHTML = "🌸";

    petalo.style.left = Math.random() * 100 + "vw";
    petalo.style.animationDuration = (5 + Math.random() * 5) + "s";
    petalo.style.fontSize = (15 + Math.random() * 10) + "px";

    document.querySelector(".petalos").appendChild(petalo);
}
</script>
</body>
</html>
