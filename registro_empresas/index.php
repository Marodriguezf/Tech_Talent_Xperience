<?php


require 'functions.php';


if (!is_logged_in()) {
    redirect('login.php');
}

$id = $_GET['id'] ?? $_SESSION['PROFILE']['id_empresa'];

$row = db_query("select * from registro_empresas where id_empresa = :id_empresa limit 1", ['id_empresa' => $id]);

if ($row) {
    $row = $row[0];
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tect Talent Xperience-Perfil Empresas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="./estilos_registro_empresas/estilos_index.css">

    <!-- Iconos -->
    <script src="https://kit.fontawesome.com/1c7ea47b2b.js" crossorigin="anonymous"></script>

</head>

<!-- Barra de Navegación -->


<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../paginas/index.html">
                <img src="./Imagenes/Logo version 2 sin fondo.png" alt="Logo" width="150" height="150"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="../paginas/index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../paginas/nosotros.html">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../registro/candidatos.php">Candidatos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Perfil empresa -->

  
    <?php if (!empty($row)) : ?>
        <div class=" row perfil col-6 border rounded mx-auto mt-5 p-1 shadow-lg">
            <div class="h1">Perfil Empresa</div>
            <div class="foto_perfil">
                <img src="<?= get_image($row['foto_empresa']) ?>" class="img-fluid rounded" alt="">
            </div>
            <div>
                <?php if(user('id_empresa') == $row['id_empresa']):?>
                    <a href="perfil_actualizar.php">
                        <button class="mx-auto m-1 btn btn-custom text-white">Actualizar</button>
                    </a>
                    <a href="perfil_eliminar.php">
                        <button class="mx-auto m-1 btn btn-custom text-white">Eliminar</button>
                    </a>
                    <a href="logout.php">
                        <button class="mx-auto m-1 btn btn-custom text-white">Cerrar sesion</button>
                    </a>
                <?php endif;?>
            </div>
            <div>
                <table class="table">
    
                    <tr>
                        <th>Nombre de la empresa</th>
                        <td><?= esc($row['nombre_empresa']) ?></td>
                    </tr>
                    <tr>
                        <th>Sector</th>
                        <td><?= esc($row['sector']) ?></td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><?= esc($row['correo_empresa']) ?></td>
                    </tr>
                    <tr>
                        <th>Descripción</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Ubicación</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Pagina web</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Redes sociales</th>
                        <td></td>
                    </tr>
    
                </table>
            </div>
        </div>
    <?php else : ?>
        <div class="text-center alert alert-danger">el perfil no esta disponible</div>
        <a href="index.php">
            <button class="btn btn-primary m-4">Inicio</button>
        </a>
    <?php endif; ?>
    <br>
    <br>
    <br>

    <!-- footer -->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#"></a>
                    <img src="./Imagenes/logo version 3.png" alt="Logo arena">
                </figure>
            </div>

            <div class="box2">
                <h2>Sobre Nosotros</h2>
                <p>Somos una plataforma web que te abre puertas a nuevas oportunidades laborales</p>
            </div>

            <div class="box3">
                <h2> Siguenos</h2>
                <div class="redes-sociales">
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