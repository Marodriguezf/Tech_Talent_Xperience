<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tect Talent Xperience- Crear Vacante</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- CSS -->
    <link rel="stylesheet" href="./estilos_crear/estilos_crear_vacante.css">

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
                </ul>
            </div>
        </div>
    </nav>

    <form method="post" onsubmit="myaction.collect_data(event, 'crear_vacante')">
        <div class="singup col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
            <div class="h2">Crear Vacante</div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-bag-shopping"></i></span>
                <input name="titulo" type="text" class="form-control" placeholder="Titulo De la Vacante">
            </div>
            <div><small class="js-error js-error-titulo text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input name="funciones" type="text" class="form-control" placeholder="Funciones">
            </div>
            <div><small class="js-error js-error-funciones text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-money-bill"></i></span>
                <input name="salario" type="text" class="form-control" placeholder="Salario">
            </div>
            <div><small class="js-error js-error-salario text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-laptop"></i></span>
                <input name="modalidad" type="text" class="form-control" placeholder="Modalidad">
            </div>
            <div><small class="js-error js-error-ubicacion text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot"></i></span>
                <input name="ubicacion" type="text" class="form-control" placeholder="Ubicacion">
            </div>
            <div><small class="js-error js-error-ubicacion text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-language"></i></span>
                <input name="idiomas" type="text" class="form-control" placeholder="Idiomas">
            </div>
            <div><small class="js-error js-error-idiomas text-danger"></small></div>
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
                <input name="conocimientos" type="text" class="form-control" placeholder="Conocimientos">
            </div>
            <div><small class="js-error js-error-conocimientos text-danger"></small></div>
            <div class="progress mb-3 mt-3 d-none">
                <div class="progress-bar" role="progressbar" style="width: 50%"> En progreso...25%</div>
            </div>

            <button class=" mt-3 btn btn-primary col-12">Crear Vacante</button>
        

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
	
	var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input, form select");
			let myform = new FormData();
			myform.append('data_type',data_type);

			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

			myaction.send_data(myform);
		},

		send_data: function (form)
		{

			var ajax = new XMLHttpRequest();

			document.querySelector(".progress").classList.remove("d-none");

			//reset the prog bar
			document.querySelector(".progress-bar").style.width = "0%";
			document.querySelector(".progress-bar").innerHTML = "En proceso... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			ajax.upload.addEventListener('progress', function(e){

				let percent = Math.round((e.loaded / e.total) * 100);
				document.querySelector(".progress-bar").style.width = percent + "%";
				document.querySelector(".progress-bar").innerHTML = "En proceso..." + percent + "%";
			});

			ajax.open('post','ajax.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			console.log(result);
			var obj = JSON.parse(result);
			if(obj.success)
			{
				alert("Vacante creada correctamente");
				window.location.href = 'index.php';
			}else{

				//show errors
				let error_inputs = document.querySelectorAll(".js-error");

				//empty all errors
				for (var i = 0; i < error_inputs.length; i++) {
					error_inputs[i].innerHTML = "";
				}

				//display errors
				for(key in obj.errors)
				{
					document.querySelector(".js-error-"+key).innerHTML = obj.errors[key];
				}
			}
		}
	};

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



</body>

</html>