<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tect Talent Xperience-singup</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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

    <form method="post">
        <div class="singup col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
            <div class="h2">Registrate</div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input name="nombre" type="text" class="form-control" placeholder="Nombre">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input name="apellido" type="text" class="form-control" placeholder="Apellido">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                <input name="correo" type="email" class="form-control" placeholder="Correo">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                <input name="confirmar_password" type="password" class="form-control" placeholder="Confirme su Password">
            </div>

            <div class="progress mb-3 d-none">
                <div class="progress-bar" role="progressbar" style="width: 50%"> En progreso...25%</div>
            </div>



            <button class="btn btn-primary col-12">Registrate</button>
            <div class="m-2"></div>
            ¿Ya tienes una cuenta?<a href="login.php">Inicia sesion</a>

        </div>
    </form>
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
    <script>
        function send_data(form)

        {
            var ajax = XMLHttpRequest();

            document.querySelector(".progress").classList.remove("d-none");

            ajax.addEventListener('readystatechange', function(){

                    if (ajax.readyState == 4) 
                    {
                        if (ajax.status == 200)
                        {
                        }else{
                            console.log(ajax);
                            alert("Ha ocurrido un error");
                        }

                    }
            });

        ajax.upload.addEventListener('progress', function(e) {


            let percent = Math.round((e.loaded / e.total) * 100)
            document.querySelector(".progress-bar").style.width = percent + "%";
            document.querySelector(".progress-bar").innerHTML = "En proceso..." + percent + "%";
        });


        ajax.open('post', 'ajax.php', true);
        ajax.send(form);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



</body>

</html>