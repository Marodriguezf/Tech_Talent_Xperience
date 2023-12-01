<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Candidatos</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="./estilos_registro/estilos_singup.css">

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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="../paginas/index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../paginas/nosotros.html">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../paginas/registrate.html">Registrate</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <form method="post" onsubmit="myaction.collect_data(event, 'signup')">
        <div class="signup col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
            <div class="h2" style="color: #080F56;">Registro Candidatos</div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input name="nombre" type="text" class="form-control" placeholder="Nombre">
            </div>
            <div><small class="js-error js-error-nombre text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input name="apellido" type="text" class="form-control" placeholder="Apellido">
            </div>
            <div><small class="js-error js-error-apellido text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                <input name="correo" type="email" class="form-control" placeholder="Correo">
            </div>
            <div><small class="js-error js-error-correo text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div><small class="js-error js-error-password text-danger"></small></div>

            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input name="confirmar_password" type="password" class="form-control"
                    placeholder="Confirme su Password">

            </div>
            <button class="mt-3 btn btn-primary col-12"
                style="background-color: #ff7300; border-color: #ff7300;">Registrate</button>


            <div class="m-2"></div>
            ¿Ya tienes una cuenta?<a href="login.php">Inicia sesion</a>

        </div>
    </form>
    <br>
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
    <script>
    var myaction = {
        collect_data: function (e, data_type) {
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

        send_data: function (form) {
            var ajax = new XMLHttpRequest();

            ajax.addEventListener('readystatechange', function () {
                if (ajax.readyState == 4) {
                    if (ajax.status == 200) {
                        // all good
                        myaction.handle_result(ajax.responseText);
                    } else {
                        console.log(ajax);
                        alert("Ha ocurrido un error");
                    }
                }
            });

            ajax.open('post', 'ajax.php', true);
            ajax.send(form);
        },

        handle_result: function (result) {
            console.log(result);
            var obj = JSON.parse(result);
            if (obj.success) {
                alert("Usuario registrado correctamente");
                window.location.href = 'login.php';
            } else {
                // show errors
                let error_inputs = document.querySelectorAll(".js-error");

                // empty all errors
                for (var i = 0; i < error_inputs.length; i++) {
                    error_inputs[i].innerHTML = "";
                }

                // display errors
                for (key in obj.errors) {
                    document.querySelector(".js-error-" + key).innerHTML = obj.errors[key];
                }
            }
        }
    };
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>



</body>

</html>