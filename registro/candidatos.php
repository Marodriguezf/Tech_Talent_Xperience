<?php

require 'functions.php';


if (!is_logged_in()) {
    redirect('login.php');
}


$rows = db_query("select * from registro_candidatos");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tect Talent Xperience-Perfil</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="./estilos_registro/estilos_index.css">

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/1c7ea47b2b.js" crossorigin="anonymous"></script>

</head>

<!-- Barra de Navegación -->

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./Imagenes/Logo.png" alt="Logo" width="66" height="80" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./vacantes.html">vacantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./empresas.html">Empresas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.html">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./registrate.html">Registrate</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Perfil candidato -->
    <div class="row">
    <?php if (!empty($rows)) : ?>
        <?php foreach ($rows as $row) : ?>
            <div class="  perfil col-2 border rounded mx-auto mt-5 p-2 shadow-lg" style="width:200px;">
                <a href="index.php?id=<?= $row['id_candidato'] ?>">
                    <div class="col-md-12 text-center">
                        <div class="foto_perfil" style="display: flex; align-items: center; justify-content: center;">
                            <img src="<?= get_image($row['foto']) ?>" class="img-fluid rounded" style="width: 170px; height: 170px;object-fit: cover;margin-right:20px;">
                        </div>
                        <div>
                            <div><?= esc($row['nombre']) ?> <?= esc($row['apellido']) ?></div>
                            <div><?= esc($row['correo']) ?></div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="text-center alert alert-danger">el perfil no esta disponible</div>
        <a href="index.php">
            <button class="btn btn-primary m-4">Inicio</button>
        </a>
    <?php endif; ?>
    </div>

    <br>
    <br>
    <br>


    <!-- footer -->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#"></a>
                    <img src="./Imagenes/Logo.png" alt="Logo arena">
                </figure>
            </div>

            <div class="box">
                <h2>Sobre Nosotros</h2>
                <p>Somos una plataforma web que te abre puertas a nuevas oportunidades laborales</p>
            </div>

            <div class="box3">
                <h2> Siguenos</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-whatsapp"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy;2023 <b>Talent Tech Xperience</b> Todos los derechos reservados</small>


    </footer>


    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



</body>

</html>