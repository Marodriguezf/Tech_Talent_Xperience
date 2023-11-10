<?php

require 'functions.php';


if (!is_logged_in()) {
    redirect('login.php');
}

$id = $_GET['id'] ?? $_SESSION['PROFILE']['id_candidato'];

$row = db_query("select * from registro_candidatos where id_candidato = :id_candidato limit 1", ['id_candidato' => $id]);

if ($row) {
    $row = $row[0];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tect Talent Xperience-Actualizar perfil</title>
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
    <?php if (!empty($row)) : ?>
        <div class=" row perfil col-6 border rounded mx-auto mt-5 p-1 shadow-lg">
            <div class="h1">Actualizar Perfil </div>
            <div class="  foto_perfil">
                <img src="<?= get_image($row['foto']) ?>" class="js-image img-fluid rounded" alt="">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Carga una nueva imagen</label>
                <input onchange="display_image(this.files[0])" class="form-control" type="file" id="formFile">
            </div>
            <form method="post" onsubmit="myaction.collect_data(event, 'perfil_actualizar')">
                <table class="table table-striped">
                    <tr>
                        <th colspan="2">Información Basica</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><input value="<?= $row['nombre'] ?>" type="text" class="form-control" name="nombre" placeholder="Nombre">
                            <div><small class="js-error js-error-nombre text-danger"></small></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td><input value="<?= $row['apellido'] ?>" type="text" class="form-control" name="apellido" placeholder="Apellidos">
                            <div><small class="js-error js-error-apellido text-danger"></small></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><input value="<?= $row['correo'] ?>" type="email" class="form-control" name="correo" placeholder="Correo">
                            <div><small class="js-error js-error-correo text-danger"></small></div>
                        </td>
                    </tr>
                    <tr>
                        <th>password</th>
                        <td><input  type="text" class="form-control" name="password" placeholder="Nuevo password ">
                            <div><small class="js-error js-error-password text-danger"></small></div>
                        </td>
                    </tr>
                    <tr>
                        <th>confirmar password</th>
                        <td><input type="text" class="form-control" name="password" placeholder=" confirmar password"></td>
                    </tr>
                    <tr>
                        <th colspan="2">Información Academica</th>
                    </tr>
                    <tr>
                        <th>Universidad/Institucion</th>
                        <td><input type="text" class="form-control" name="universidad" placeholder="Universidad"></td>
                    </tr>
                    <tr>
                        <th>Carrera</th>
                        <td><input type="text" class="form-control" name="carrera" placeholder="Carrera"></td>
                    </tr>
                    <tr>
                        <th>Semestre</th>
                        <td><input type="number" class="form-control" name="carrera" placeholder="Semestre"></td>
                    </tr>
                    <tr>
                        <th>Idiomas</th>
                        <td><input type="text" class="form-control" name="idiomas" placeholder="Idiomas"></td>

                    </tr>
                    <tr>
                        <th>Ubicación</th>
                        <td><input type="text" class="form-control" name="ubicacion" placeholder="Ubicacion"></td>
                    </tr>
                    <tr>
                        <th>CV</th>
                        <td><input type="file" name=""></td>
                    </tr>
                    <tr>
                        <th colspan="2">Experiencia laboral (opcional)</th>
                    </tr>
                    <tr>
                        <th>Empresa</th>
                        <td><input type="text" class="form-control" name="empresa" placeholder="Nombre empresa"></td>
                    </tr>
                    <tr>
                        <th>Fecha inicio</th>
                        <td><input type="date" class="form-control" name="fecha_inicio" placeholder="Fecha de inicio"></td>
                    </tr>
                    <tr>
                        <th>Fecha fin</th>
                        <td><input type="date" class="form-control" name="fecha_fin" placeholder="Fecha fin"></td>
                    </tr>
                    <tr>
                        <th>Funciones</th>
                        <td><input type="text" class="form-control" name="funciones" placeholder="Funciones"></td>
                    </tr>

                </table>

                <div class="progress mb-3 mt-3 d-none">
                    <div class="progress-bar" role="progressbar" style="width: 50%"> En progreso...25%</div>
                </div>


                <div class="p-2">
                    <button class="btn btn-primary  float-end">Guardar</button>
                    <a href="index.php">
                        <label class="btn btn-secondary">volver</button>
                    </a>

                </div>

            </form>

        </div>


        </div>
    <?php else : ?>
        <div class="text-center alert alert-danger">el perfil no esta disponible</div>
        <a href="index.php">
            <button class="btn btn-primary m-4">Inicio</button>
        </a>
    <?php endif; ?>




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
    <!-- Funcion para cambiar la fuente de la imagen -->
    <script>
        function display_image(file) {
            var img = document.querySelector(".js-image");
            img.src = URL.createObjectURL(file);
        }

        var myaction = {
            collect_data: function(e, data_type) {
                e.preventDefault();
                e.stopPropagation();

                var inputs = document.querySelectorAll("form input, form select");
                let myform = new FormData();
                myform.append('data_type', data_type);

                for (var i = 0; i < inputs.length; i++) {

                    myform.append(inputs[i].name, inputs[i].value);
                }

                myaction.send_data(myform);
            },

            send_data: function(form) {

                var ajax = new XMLHttpRequest();

                document.querySelector(".progress").classList.remove("d-none");

                //reset the prog bar
                document.querySelector(".progress-bar").style.width = "0%";
                document.querySelector(".progress-bar").innerHTML = "Working... 0%";

                ajax.addEventListener('readystatechange', function() {

                    if (ajax.readyState == 4) {
                        if (ajax.status == 200) {
                            //all good
                            myaction.handle_result(ajax.responseText);
                        } else {
                            console.log(ajax);
                            alert("An error occurred");
                        }
                    }
                });

                ajax.upload.addEventListener('progress', function(e) {

                    let percent = Math.round((e.loaded / e.total) * 100);
                    document.querySelector(".progress-bar").style.width = percent + "%";
                    document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
                });

                ajax.open('post', 'ajax.php', true);
                ajax.send(form);
            },

            handle_result: function(result) {
                console.log(result);
                var obj = JSON.parse(result);
                if (obj.success) {
                    alert("Cambios Guardados correctamente");
                    window.location.reload();
                } else {

                    //show errors
                    let error_inputs = document.querySelectorAll(".js-error");

                    //empty all errors
                    for (var i = 0; i < error_inputs.length; i++) {
                        error_inputs[i].innerHTML = "";
                    }

                    //display errors
                    for (key in obj.errors) {
                        document.querySelector(".js-error-" + key).innerHTML = obj.errors[key];
                    }
                }
            }
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



</body>

</html>