<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
    <link rel="stylesheet" href="./utiles/css/dist/output.css" type="text/css" />
</head>
<body class="container max-w-screen-xxl mx-auto bg-fondohf text-white">
    <header class="container max-w-screen-2xl mt-[16px] mb-[10px]">
        <a href="index.php?ctl=inicio" class="w-[100px]"><img src="./utiles/img/front/logo.svg" alt="logo"></a>
    </header>
    <main class="container max-w-screen-2xl h-[665px] pt-[47px] pb-[51px] px-[200px] bg-fondoImg">
        <div class="container h-[592px] px-[100px] pt-[70px] pb-[50px] bg-blur backdrop-blur-[10px] rounded-[15px]">
            <div>
                <a href="index.php?ctl=listadoP" class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
            </div>
            <h2 class="pb-[12px]">Añadir pelicula</h2>
            <form action="index.php?ctl=addPelicula" method="post" enctype="multipart/form-data" class="container grid gap-[20px] grid-cols-2">
                <div>
                    <input type="text" name="nombre" id="nombre" placeholder="Título" value="<?= $_SESSION['resguardo']['nombre'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <input type="text" name="argumento" id="argumento" placeholder="Argumento" value="<?= $_SESSION['resguardo']['apellidos'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <input type="text" name="edad" id="edad" placeholder="Clasificación edad" value="<?= $_SESSION['resguardo']['email'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <select name="generos" id="generos" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                        <?php foreach($_SESSION['admin']['generos'] as $genero){?>
                            <option value="<?= $genero['id'] ?>"><?= $genero['nombre'] ?></option>    
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <input list="actores" id="actor" name="actor" placeholder="Introduce un actor" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form"/>
                    <datalist id="actores">
                        <?php foreach($_SESSION['admin']['actores'] as $actor){ ?>
                            <option value="<?= $actor['nombre'] ?>"><?= $actor['id'] ?></option>
                        <?php }?>
                    </datalist>
                    <input list="directores" id="director" name="director" placeholder="Introduce un director" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form"/>
                    <datalist id="directores">
                        <?php foreach($_SESSION['admin']['directores'] as $director){ ?>
                            <option value="<?= $director['nombre'] ?>"><?= $director['id'] ?></option>
                        <?php }?>
                    </datalist>
                    <input type="file" name="cartel" id="cartel" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <input type="submit" value="Confirmar" class="block w-[100%] bg-rosa mb-[7px] px-[80px] py-[10px] rounded-[7px]">
                </div>
            </form>
            <h2><?= $_SESSION['error'] ?></h2>
        </div>
    </main>
</body>
</html>